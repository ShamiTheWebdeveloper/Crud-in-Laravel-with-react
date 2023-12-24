import React from 'react';
import {Link} from "react-router-dom";

const Login = () => {
    const onSubmit = (ev) => {
      ev.preventDefault();
      alert(ev);
    }
    return (
        <div className='login-signup-form animated fadeInDown'>
            <div className='form'>
                <form onSubmit={onSubmit}>
                    <h1 className='title'>Login to your account</h1>

                    <input type='email' placeholder='Enter an email'/>
                    <input type='password' placeholder='Enter a password'/>

                    <button className='btn btn-block'>Login</button>
                    <p className='message'>
                        Not Registered ? <Link to='/signup'>Signup</Link>
                    </p>
                </form>
            </div>
        </div>
    );
};

export default Login;
