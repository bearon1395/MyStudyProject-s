 import firebase from 'firebase/app'
 import 'firebase/firestore'
 import 'firebase/auth'

 // Your web app's Firebase configuration
 var firebaseConfig = {
    apiKey: "AIzaSyAObPsH44CzVXX9UxJZGud1daxvA6KzQ_0",
    authDomain: "new-project-react-6c18d.firebaseapp.com",
    databaseURL: "https://new-project-react-6c18d.firebaseio.com",
    projectId: "new-project-react-6c18d",
    storageBucket: "new-project-react-6c18d.appspot.com",
    messagingSenderId: "896581187996",
    appId: "1:896581187996:web:9190ce2646a6e9572b3059",
    measurementId: "G-WNDYXKZQ6P"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
//   firebase.analytics();

export default firebase