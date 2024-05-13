import requests
import json

# URL of the local Flask app
url = 'http://127.0.0.1:5000/predict'

data = {
    "Motivation": "Keeping people and information safe",  # Typically Cyber Security
    "Projects": "Developing the next popular app",  # Can relate to Software Development
    "Learning Style": "By organizing information and making plans",  # Relevant to BIS
    "Problems to Solve": "Helping companies understand big data",  # Typically Data Science
    "Subjects": "Law and ethics",  # Relevant to Cyber Security and compliance roles
    "Role in Project": "Managing tasks and resources",  # BIS and Project Management
    "Team Environment": "One that is fast-paced and project-driven",  # Applies to many tech fields, including Software Development
    "Technology Aspect": "Predictive analytics and decision making",  # Data Science
    "Impact Importance": "Critical, I want to make sure everyone's data is safe",  # Cyber Security
    "Career Drive": "The ability to improve business practices"  # BIS
}

# Make a POST request
response = requests.post(url, json=data)

try:
    response.raise_for_status()  # Raise an error for bad status codes
    print('Status Code:', response.status_code)
    print('Output:', response.json())
except requests.exceptions.HTTPError as err:
    print('HTTP error occurred:', err)
except json.decoder.JSONDecodeError as err:
    print('Error decoding JSON response:', err)