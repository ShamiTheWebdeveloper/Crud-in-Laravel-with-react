import React from 'react';
import {Outlet} from "react-router-dom";

function DefaultLayout(props) {
    return (
        <Outlet/>
    );
}

export default DefaultLayout;
