import {createContext} from "react";

const StateContext=createContext({
    currentUser:null,
    token:null
});

export const ContextPrivider=({children})=>{
    return (
        <StateContext.Provider value={{}}>

        </StateContext.Provider>
    )
}
