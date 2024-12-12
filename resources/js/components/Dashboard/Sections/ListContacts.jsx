import {useState} from 'react'

export function ListContact(){

    const [contactos,setContactos]=useState(window.Contactos);

    return <>
        <div className="w-100 py-4 border-bottom d-flex align-items-center px-5">
            <div className='d-flex justify-content-between w-100'>
                <div className=''>
                    <h3>Lista de contactos- {window.user.name}</h3>
                </div>
                <div className='d-flex justify-content-end'>
                    <button className='btn btn-primary'>
                        <i className='fa-solid fa-plus'></i>
                    </button>
                </div>
            </div>
        </div>

        {
            contactos.map(contacto=>(
                <div className="w-100 py-4 border px-5" key={contacto.idContact}>
                    <strong>
                        { contacto.name }
                    </strong>
                </div>
            ))
        }
    </>

}

