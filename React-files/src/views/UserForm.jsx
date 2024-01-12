import React, {useEffect, useState} from 'react';
import {useNavigate, useParams} from "react-router-dom";
import axiosClient from "../axios-client.js";
import {useStateContext} from "../context/ContextProvider.jsx";

function UserForm() {
    let {id} = useParams();
    const navigate=useNavigate();
    const [loading,setLoading]=useState(false);
    const [errors,setErrors]=useState(null); //  Errors for empty input fields
    const {setNotification}=useStateContext();
    const [user,setUser]=useState({
        id:null,
        name:'',
        email:'',
        password:'',
        password_confirmation:''
    });

    if (id){
        useEffect(() => {
            setLoading(true);
            axiosClient.get(`/users/${id}`)
                .then(({data})=>{
                    setLoading(false);
                    setUser(data);
                    console.log(data);
                })
                .catch(()=>{
                    setLoading(false);
            });
        }, []);
    }
    const onSubmit = (ev) => {
      ev.preventDefault();
      if (user.id){
          axiosClient.put(`/users/${user.id}`,user)
              .then(()=>{
                 navigate('/users');
                 setNotification('Users successfully updated');
              })
              .catch( err => {
                  const response = err.response;
                  if (response && response.status === 422) {
                      setErrors(response.data.errors);
                  }else {
                      alert(response.status);
                  }
              })
      }else {
          axiosClient.post(`/users`,user)
              .then(()=>{
                  navigate('/users');
                  setNotification('User successfully Added');
              })
              .catch( err => {
                  const response = err.response;
                  if (response && response.status === 422) {
                      setErrors(response.data.errors);
                  }else {
                      alert(response.status);
                  }
              })
      }
    }

    return (
        <>
            {user.id && <h1>Update User:{user.name}</h1>}
            {!user.id && <h1>Add new User</h1>}
            <div className='card animated fadeInDown'>
                {loading && (
                    <div className='text-center'>Loading...</div>
                )}
                {errors &&
                    <div className='alert'>
                        {Object.keys(errors).map(key_errors=>(
                            <p key={key_errors}>{errors[key_errors]}</p>
                        ))}
                    </div>
                }
                {!loading &&
                    <form onSubmit={onSubmit}>
                        <input type='text' value={user.name} onChange={ev =>setUser({...user,name:ev.target.value }) } placeholder='Name'/>
                        <input type='email' value={user.email} onChange={ev =>setUser({...user,email:ev.target.value }) } placeholder='Email'/>
                        <input type='password' onChange={ev =>setUser({...user,password:ev.target.value }) } placeholder='Password'/>
                        <input type='password' onChange={ev =>setUser({...user,password_confirmation:ev.target.value }) } placeholder='Password confirmation'/>
                        <button className='btn'>Save</button>
                    </form>
                }

            </div>
        </>
    );
}

export default UserForm;
