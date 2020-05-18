import React from 'react';
// import logo from './logo.svg';
import './App.css';
import { BrowserRouter as Router, Route } from "react-router-dom";
import ProductList from "./navigation/products";
import AddProduct from "./navigation/add";
import Login from "./navigation/home";

// import firebase from './firebase'


function App() {
  return (
    <Router>
      <div>
        <Route exact path="/products" component={ProductList} />
        <Route exact path="/add" component={AddProduct} />
        <Route exact path="/" component={Login} />
      </div>
    </Router>
  );
}

export default App;
