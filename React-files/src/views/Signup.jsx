import React, {useRef} from 'react';
import {Link} from "react-router-dom";
import axiosClient from "../axios-client.js";
import {useStateContext} from "../context/ContextProvider.jsx";

const Signup = () => {

    const nameRef=useRef();
    const emailRef=useRef();
    const passwordRef=useRef();
    const confirmpasswordRef=useRef();

    const {setUser,setToken}=useStateContext();
    const onSubmit = (ev) => {
        ev.preventDefault();
        const payload={
            name:nameRef.current.value,
            email:emailRef.current.value,
            password:passwordRef.current.value,
            password_confirmation:confirmpasswordRef.current.value
        }
        console.log(payload);
        axiosClient.post('/signup',payload)
            .then(({data})=>{
                setUser(data.user)
                setToken(data.token)
            })
            .catch(err=>{
                const response=err.response;
                if (response && response.status===422){
                    alert(response.data.errors);
                }
            })
    }
    return (
        <div className='login-signup-form animated fadeInDown'>
            <div className='form'>
                <form onSubmit={onSubmit}>
                    <h1 className='title'>Signup your account</h1>
                    <input type='text' ref={nameRef} placeholder='Enter your username'/>
                    <input type='email' ref={emailRef} placeholder='Enter an email'/>
                    <input type='password' ref={passwordRef} placeholder='Enter a password'/>
                    <input type='password' ref={confirmpasswordRef} placeholder='Confirm password'/>
                    <button className='btn btn-block'>Signup</button>
                    <p className='message'>
                        Already Registered ? <Link to='/login'>Login</Link>
                    </p>
                </form>
             </div>
         </div>
    );
};

export default Signup;
