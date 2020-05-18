import React, { useCallback, useContext } from 'react'

const Login = () => {
    return (
        <div className="content">
            <h1>Navigation:</h1>
            <p>Products: <button onClick={event => window.location.href = '/products'}>Go to</button></p>
            <p>Add product: <button onClick={event => window.location.href = '/add'}>Go to</button></p>
        </div>
    );
}
export default Login;