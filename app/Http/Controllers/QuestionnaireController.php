<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questions= [
            "Motivation" => ["Helping solve real-world problems", "Understanding how data can improve lives", "Keeping people and information safe", "Improving the efficiency of businesses", "Building apps or websites that people use every day"],
            "Projects" => ["Creating systems that can think and learn", "Analyzing trends to help make decisions", "Protecting data from hackers", "Using software to help businesses run better", "Developing the next popular app"],
            "Learning Style" => ["By experimenting and trying new things", "By looking at patterns and solving puzzles", "By focusing on details and finding errors", "By organizing information and making plans", "By building things and seeing the results"],
            "Problems to Solve" => ["Making machines smarter", "Helping companies understand big data", "Stopping cyber attacks", "Streamlining business operations", "Creating software that’s easy to use"],
            "Subjects" => ["Science and experiments", "Math and statistics", "Law and ethics", "Business studies", "Computer classes"],
            "Role in Project" => ["Researching new ideas and technologies", "Analyzing data to find the best answer", "Ensuring everything is secure and private", "Managing tasks and resources", "Coding and technical troubleshooting"],
            "Team Environment" => ["One where creativity is encouraged", "One where precision and accuracy are valued", "One that prioritizes safety and trust", "One that focuses on clarity and structure", "One that is fast-paced and project-driven"],
            "Technology Aspect" => ["Artificial intelligence and robotics", "Predictive analytics and decision making", "Internet safety and ethics", "The role of IT in business success", "Building and programming devices"],
            "Impact Importance" => ["Very important, I want to create things that can change the world", "Important, I like to see how data can help make better decisions", "Critical, I want to make sure everyone's data is safe", "Important, I want to help businesses succeed", "Very important, I like to make things that people interact with daily"],
            "Career Drive" => ["The chance to innovate and lead in technology", "The opportunity to solve complex problems", "The importance of protecting and securing information", "The ability to improve business practices", "The creativity involved in designing new software"]
        ];
        return view('pathways.questionaire', ['questions' => $questions]);
    }

public function submit(Request $request)
{
    // Define the keys expected by the Flask API
    $keys = [
        "Motivation",
        "Projects",
        "Learning Style",
        "Problems to Solve",
        "Subjects",
        "Role in Project",
        "Team Environment",
        "Technology Aspect",
        "Impact Importance",
        "Career Drive"
    ];

    // Map the Laravel form field names to the keys expected by the Flask API
    $keyMappings = [
        "Motivation" => "Motivation",
        "Projects" => "Projects",
        "Learning_Style" => "Learning Style",
        "Problems_to_Solve" => "Problems to Solve",
        "Subjects" => "Subjects",
        "Role_in_Project" => "Role in Project",
        "Team_Environment" => "Team Environment",
        "Technology_Aspect" => "Technology Aspect",
        "Impact_Importance" => "Impact Importance",
        "Career_Drive" => "Career Drive"
    ];

    // Extract the necessary keys from the request data and map them to the expected keys
    $data = [];
    foreach ($keyMappings as $key => $mappedKey) {
        if ($request->has($key)) {
            $data[$mappedKey] = $request->input($key);
        }
    }

    try {
        // Make a POST request to your Flask API
        $response = Http::post('http://170.64.216.76:5000/predict', $data);

        // Check if the request was successful
        if ($response->successful()) {
            // Extract the predicted career path from the response
            $careerPath = $response->json();

            // Pass the predicted career path to the view
            return view('pathways.result', ['careerPath' => $careerPath]);
        } else {
            // Handle unsuccessful response
            return response()->json(['error' => 'Failed to get a successful response from the Flask API'], 500);
        }
    } catch (Exception $e) {
        // Handle exceptions
        return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
    }
}

}