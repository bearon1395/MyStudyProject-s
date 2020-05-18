import React, { useState, useEffect } from 'react'

import firebase from '../firebase'

function useProducts() {
    const [products, setProducts] = useState([])

    useEffect(() => {
        firebase
            .firestore()
            .collection('products')
            .onSnapshot((snapshot) => {
                const newProducts = snapshot.docs.map((doc) => ({
                    id: doc.id,
                    ...doc.data()
                }))

                setProducts(newProducts)
            })
    }, [])

    return products
}

const ProductsList = () => {
    const products = useProducts()

    return (
        <div className="content">
            <div className="procucts-list">
                <ol>
                    {products.map((product) =>
                        <li key={product.id}>
                            <div className="product-title">{product.title}</div>
                            <div className="product-specification">{product.specification}</div>
                            <div className="product-price">Price: <b>{product.price} ₴</b></div>
                        </li>
                    )}
                </ol>
            </div>
        </div>
    )
}

export default ProductsList