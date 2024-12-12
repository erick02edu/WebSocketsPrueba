import { useEffect, useState } from "react"
import axios from "axios";
import { Mensaje } from "../Components/Mensaje";

export function Chat(){

    const [mensajes,setMensajes]=useState(window.mensajes)
    const [mensaje,setMensaje]=useState("");

    const idChat=2;
    let idEmisor=window.user.id;

    useEffect(()=>{

        let chatChannel=window.Echo.channel(`chat_${idChat}`)
        .listen('MessageSend', (event) => {
            console.log('Mensaje websocket recibido:', event.mensaje);

            setMensajes((prevMensajes) => [
                ...prevMensajes,
                event.mensaje,
            ]);
        });

        return ()=>{
            chatChannel.stopListening("MessageSend");
            window.Echo.leaveChannel("chat");
        }

    },[])


    const handleChangeMensaje=(e)=>{
        setMensaje(e.target.value);
    }

    const sendMessage=async ()=>{

        let data={
            mensaje,
            idEmisor,
            idChat,
        }

        try {
            const response=await axios.post('/api/sendMessage',data)
            setMensaje("");
        } catch (error) {
            console.log(error);
        }
    }

    return <>
        <div className="d-flex flex-column gap-2 h-100 w-100 justify-content-between">
            <div className="border border-red h-100 w-100 h-100 d-flex flex-column gap-2 px-2 pb-3
            position-relative overflow-y-auto"
            style={{ maxHeight:"100vh" }}>
                <div className="bg-body position-sticky top-0 py-2 d-flex align-items-center border-bottom">
                    <h3>Chat con</h3>
                </div>
                {
                    mensajes.map(mensaje=>(
                        <Mensaje key={mensaje.id} mensaje={mensaje}/>
                    ))
                }
            </div>

            <div className="">
                <div className="">
                    <div className="w-100 d-flex flex-nowrap">
                        <div className="pe-2" style={{width: '90%'}}>
                            <input type="text" name="mensaje" id="mensaje"
                                placeholder="Ingresa tu mensaje" className="form-control w-100 rounded-2"
                            value={mensaje} onChange={handleChangeMensaje}
                            />
                        </div>

                        <div className="d-flex justify-content-center" style={{width:'10%'}}>
                            <button onClick={sendMessage} disabled={ mensaje==""} className="btn btn-primary rounded-4">
                                Send
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </>
}

