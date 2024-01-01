import React from 'react';
import {Link, Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../context/ContextProvider.jsx";
import axiosClient from "../axios-client.js";

function DefaultLayout(props) {
    const {user,token, setUser, setToken}=useStateContext();
    if (!token){
        return <Navigate to='/login'/>
    }

    function onLogout(ev) {
        ev.preventDefault();
        alert(ev);
        // axiosClient.post('/logout')
        //     .then(() => {
        //         setUser({})
        //         setToken(null)
        //     })
    }

    return (
        <div id='defaultLayout'>
            <aside>
                <Link to='/dashboard'>Dashboard</Link>
                <Link to='/users'>Users</Link>
            </aside>

            <div className='content'>
                <header>

                    <div>
                        Header
                    </div>
                    <div>
                        {user.name}
                        <a href='#' onClick={onLogout} className='btn-logout'>Logout</a>
                    </div>
                </header>

                <main>
                    <Outlet/>
                </main>

            </div>
        </div>
    );
}

export default DefaultLayout;
