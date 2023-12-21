import React from 'react';
import {Link, Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../context/ContextProvider.jsx";

function DefaultLayout(props) {
    const {user,token}=useStateContext();
    if (!token){
        return <Navigate to='/login'/>
    }

    return (
        <div id='defaultLayout'>
            <aside>
                <Link to='/dashboard'>Dashboard</Link>
                <Link to='/users'>Users</Link>
            </aside>
            <div className='content'>
                <header>

                </header>
            </div>
            <Outlet/>
        </div>
    );
}

export default DefaultLayout;
