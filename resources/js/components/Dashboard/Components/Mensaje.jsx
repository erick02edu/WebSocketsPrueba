
export function Mensaje({mensaje}){

    return <div key={mensaje.id}
        className={`d-flex w-50 flex px-2 rounded-3 border-3 py-1 text-white
        ${mensaje.idEmisor!=window.user.id ? "bg-danger align-self-start" : "bg-warning align-self-end"}
        `}
        >
            <div className="w-100">
                { mensaje.mensaje }
            </div>

            <div className="d-flex justify-content-end align-items-end">
                <small className="d-flex">
                    <i className="fa-solid fa-circle-check"></i>
                </small>
            </div>
    </div>
}

