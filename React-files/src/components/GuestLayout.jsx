import React from 'react';
import {Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../context/ContextProvider.jsx";

function GuestLayout(props) {
    const {token}=useStateContext();
    if (token){
        return <Navigate to='/'/>
    }

    return (

           <Outlet/>

    );
}

export default GuestLayout;
