from flask import Flask, request, jsonify
import tensorflow as tf
from tensorflow.keras.models import load_model
import joblib
import numpy as np
import pandas as pd
app = Flask(__name__)

# Load the trained model and encoder
model = load_model('/var/www/html/EdBridge/model/career_path_model.h5')
encoder = joblib.load('/var/www/html/EdBridge/model/onehotencoder.pkl')

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json(force=True)
    # Encode the incoming JSON data
    df = pd.DataFrame([data])
    encoded_features = encoder.transform(df)
    
    # Make prediction
    prediction = model.predict(encoded_features)
    predicted_class = np.argmax(prediction, axis=1)
    
    # Map the predicted class index to the career name
    career_mapping = {
        0: "Artificial Intelligence",
        1: "Data Science",
        2: "Cyber Security",
        3: "Business Information System",
        4: "Software Development"
    }
    result = career_mapping[predicted_class[0]]
    return jsonify(result)

if __name__ == '__main__':
    app.run(port=5000, debug=True)
