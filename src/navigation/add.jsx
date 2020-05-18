import React, { useState, useEffect } from 'react'
import ProductsList from '../components/products-list'
import AddProductForm from '../components/add-product-form'

const AddProduct = () => {
    return (
        <div className="content">
            <div className="add-product">
                <h1>Add product:</h1>
                <AddProductForm />
                <ProductsList />
            </div>
            <button onClick={event => window.location.href = '/'}>Back</button>
        </div>
    );
}
export default AddProduct;