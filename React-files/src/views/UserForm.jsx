import React, {useState} from 'react';
import {useParams} from "react-router-dom";

function UserForm() {
    const {id}=useParams();

    const [user,setUser]=useState({
        id:null,
        name:'',
        email:'',
        password:'',
        password_confirmation:''
    });

    return (
        <div>

        </div>
    );
}

export default UserForm;
