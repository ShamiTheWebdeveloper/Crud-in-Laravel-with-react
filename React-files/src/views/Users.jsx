import React, {useEffect, useState} from 'react';
import axiosClient from "../axios-client.js";

const Users = () => {
    const [users,setUsers]=useState(false);
    const [loading,setLoading]=useState(false);

    useEffect(() => {
        getUsers();
    }, []);

    const getUsers = () => {
        setLoading(true);
        axiosClient.get('/users')
            .then(({data})=>{
                setLoading(false);
                console.log(data);
            })
            .catch(()=>{
                setLoading(false);
            })
    }
    return (
        <div>

        </div>
    );
};

export default Users;
