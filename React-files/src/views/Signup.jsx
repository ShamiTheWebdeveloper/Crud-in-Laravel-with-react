import React, {useRef} from 'react';
import {Link} from "react-router-dom";

const Signup = () => {

    const nameRef=useRef();
    const emailRef=useRef();
    const passwordRef=useRef();
    const confirmRef=useRef();
    const onSubmit = (ev) => {
        ev.preventDefault();
        alert(ev);
    }
    return (
        <div className='login-signup-form animated fadeInDown'>
            <div className='form'>
                <form onSubmit={onSubmit}>
                    <h1 className='title'>Signup your account</h1>
                    <input type='text' ref={nameRef} placeholder='Enter your username'/>
                    <input type='email' ref={emailRef} placeholder='Enter an email'/>
                    <input type='password' ref={passwordRef} placeholder='Enter a password'/>
                    <input type='password' ref={confirmRef} placeholder='Confirm password'/>
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
