import React, {createRef, useState} from 'react';
import {Link} from "react-router-dom";
import axiosClient from "../axios-client.js";
import {useStateContext} from "../context/ContextProvider.jsx";

const Login = () => {
    const emailRef=createRef();
    const passwordRef=createRef();

    const [errors,setErrors]=useState(null); //  Errors for empty input fields
    const {setUser,setToken}=useStateContext();
    const Loginuser = (ev) => {
      ev.preventDefault();
        const payload={
            email:emailRef.current.value,
            password:passwordRef.current.value,
        }

        console.log(payload);
        // debugger;
        axiosClient.post('/login',payload)
            .then(({data}) => {
                setUser(data.user)
                setToken(data.token)
            })
            .catch((err) => {
                const response = err.response;
                if (response && response.status === 422) {
                    if (response.data.errors){
                        setErrors(response.data.errors);
                    }else {
                        setErrors({
                            email:[response.data.message]
                        })
                    }

                }else {
                    alert(response.status);
                }
            })
    }
    return (
        <div className='login-signup-form animated fadeInDown'>
            <div className='form'>
                <form onSubmit={Loginuser}>
                    <h1 className='title'>Login to your account</h1>
                    {errors &&
                        <div className='alert'>
                            {Object.keys(errors).map(key_errors=>(
                                <p key={key_errors}>{errors[key_errors]}</p>
                            ))}
                        </div>

                    }
                    <input type='email' ref={emailRef} placeholder='Enter an email'/>
                    <input type='password' ref={passwordRef} placeholder='Enter a password'/>

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
