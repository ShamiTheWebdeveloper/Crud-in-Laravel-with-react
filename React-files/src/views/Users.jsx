import React, {useEffect, useState} from 'react';
import axiosClient from "../axios-client.js";
import {Link} from "react-router-dom";

const Users = () => {
    const [users,setUsers]=useState(false);
    const [loading,setLoading]=useState(false);

    useEffect(() => {
        getUsers();
    }, []);

    function onDelete(u) {
        if (!window.confirm('Really want to delete?')){
            return
        }

        axiosClient.delete(`/users/${u.id}`)
            .then(()=>{
                getUsers();
            })
    }

    const getUsers = () => {
        setLoading(true);
        axiosClient.get('/users')
            .then(({data})=>{
                setLoading(false);
                setUsers(data.data);
                console.log(data);
            })
            .catch(()=>{
                setLoading(false);
            })
    }
    return (
        <div>
            <div style={{display:'flex',justifyContent:'space-between',alignItems:'center'}}>
                <h1>Users</h1>
                <Link to='/users/new' className='btn-add'>Add New</Link>
            </div>

            <div className='card animated fadeInDown'>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Create Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    { loading &&
                    <tbody>
                    <tr>
                        <td colSpan='5' className='text-center'>
                            Loading...
                        </td>
                    </tr>
                    </tbody>
                    }
                    {!loading &&
                        <tbody>
                        {users && users.map(u => (
                            <tr key={u.id}>
                                <td>{u.id}</td>
                                <td>{u.name}</td>
                                <td>{u.email}</td>
                                <td>{u.created_at}</td>
                                <td>
                                    <Link className='btn-edit' to={'/users/'+u.id}>Edit</Link>
                                    &nbsp;
                                    <button className='btn-delete' onClick={ev=>onDelete(u)}>Delete</button>
                                </td>
                            </tr>
                        ))}
                        </tbody>
                    }

                </table>
            </div>
        </div>
    );
};

export default Users;
