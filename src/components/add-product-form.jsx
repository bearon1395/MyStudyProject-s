import React, { useState } from 'react'

import firebase from '../firebase'

const AddProductForm = () => {
    const [title, setTitle] = useState('')
    const [specification, setSpecification] = useState('')
    const [price, setPrice] = useState('')

    function onSubmit(e) {
        e.preventDefault()

        firebase
            .firestore()
            .collection('products')
            .add({
                title,
                specification,
                price: parseInt(price)
            })
            .then(() => {
                setTitle('')
                setSpecification('')
                setPrice('')
            })
    }

    return (
        <div className="add-form">
            <form onSubmit={onSubmit}>
                <h4>Add Product</h4>

                <label>Title</label>
                <input type="text" value={title} onChange={e => setTitle(e.currentTarget.value)} />


                <label>Specification</label>
                <input type="text" value={specification} onChange={e => setSpecification(e.currentTarget.value)} />


                <label>Price</label>
                <input type="number" value={price} onChange={e => setPrice(e.currentTarget.value)} />

                <button>Add Product</button>
            </form>
        </div>
    )
}

export default AddProductForm