import React, {useEffect, useState} from 'react';
import {useParams} from "react-router-dom";
import axiosClient from "../axios-client.js";

function UserForm() {
    let {id} = useParams();
    const [loading,setLoading]=useState(false);
    const [errors,setErrors]=useState(null); //  Errors for empty input fields
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

            axiosClient.get('/users/${id}')
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

    return (
        <>
            {user.id && <h1>Update User:{user.name}</h1>}
            {!user.id && <h1>Add new User</h1>}
            <div className='card animated fadeInDown'>
                {loading && (
                    <div className='text-center'>Loading..</div>
                )}
                {errors &&
                    <div className='alert'>
                        {Object.keys(errors).map(key_errors=>(
                            <p key={key_errors}>{errors[key_errors]}</p>
                        ))}
                    </div>

                }
            </div>
        </>
    );
}

export default UserForm;
