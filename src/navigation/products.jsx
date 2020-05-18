import React, { useState, useEffect } from 'react'
import ProductsList from '../components/products-list'

const ProductList = () => {
    return (

        <div className="content">
            <h1>Products:</h1>
            <ProductsList />
            <button onClick={event => window.location.href = '/'}>Back</button>
        </div>
    );
}
export default ProductList;