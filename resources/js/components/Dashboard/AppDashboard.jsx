
import React from 'react';
import {createRoot} from 'react-dom/client'
import { Chat } from './Sections/Chat';
import { ListContact } from './Sections/ListContacts';

export function AppDashboard(){
    return (
        <div className="container-fluid" style={{height:"100vh"}}>
             <div className="row row-cols-1 row-cols-md-2 h-100">
                <div className="col p-0 d-none d-md-inline ">
                    <ListContact/>
                </div>
                <div className="col border border-red pb-5 overflow-y-hidden" style={{ maxHeight:"100%" }} >
                    <Chat/>
                </div>
            </div>
        </div>
    )
}

if(document.getElementById('appDashboard')){
    createRoot(document.getElementById("appDashboard")).render(<AppDashboard/>)
}






