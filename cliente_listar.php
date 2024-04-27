.layout {
    width: 90%;
    height: 600px;
  
    display: grid;
    grid:
      "name1 name1 name1" 1fr
      "name2 name3 name3" 1fr
      "name2 name3 name3" 1fr
      / 1fr 1fr 1fr;
    gap: 0px;
  }
  
  .name1 { grid-area: name1; }
  .name2 { grid-area: name2; }
  .name3 { grid-area: name3; }

body {
    height: 700px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #dfdfee;
    background-image: 
        radial-gradient(at 47% 33%, hsl(180.00, 90%, 51%) 0, transparent 59%), 
        radial-gradient(at 82% 65%, hsl(190.46, 52%, 59%) 0, transparent 55%);
}

.name2 {
    height: 600px;
    width: 210px;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    font-size: 15px;
    font-family: 'Roboto Mono', monospace;
    font-weight: bold;
}

.name3 {
    width: 1150px;
    height: 600px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-size: 15px;
    font-family: 'Roboto Mono', monospace;
    font-weight: bold;
}

#form_name2 {
    display: flex;
    align-items: center;
    flex-direction: column;
    padding: 5px;
}

input {
    width: 150px;
    font-size: 15px;
    font-family: 'Roboto Mono', monospace;
    font-weight: bold;
    cursor: pointer;
}

select {
    width: 150px;
    font-size: 15px;
    font-family: 'Roboto Mono', monospace;
    font-weight: bold;
    cursor: pointer;
}

#submit, #listar_fo {
    height: 35px;
    width: 160px;
    padding: 5px;
    border-radius: 10px;
    text-align: center;
}

#bt_tipo, #bt_marca, #bt_modelo, #bt_catalogo {
    margin-top: 5px;
}

button {
    width: 160px;
    height: 35px;
    font-size: 15px;
    font-family: 'Roboto Mono', monospace;
    font-weight: bold;
    cursor: pointer;
}

.layout {
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgb(199, 255, 250);
    border-radius: 12px;
}

.name1, .name2, .name3 {
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgb(144, 238, 254);
    border-radius: 12px;
    border: 2px solid rgb(255, 255, 255);
}

#form_name2 {
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgb(83, 218, 255);
    border-radius: 12px;
    border: 2px solid rgb(255, 255, 255);
    width: 180px;
    height: 580px;
}

input , select, textarea{
    background-color: rgb(255, 255, 255);
    color: black;
    border: 2px solid rgb(0, 75, 226);
}

label{
    color: rgb(255, 255, 255);
}

h2 {
    color: rgb(255, 255, 255);
}

button , #submit, #bt_cliente, #bt_fo{
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgb(0, 170, 255);
    border-radius: 12px;
    border: 3px solid rgb(255, 255, 255);
    color:rgb(255, 255, 255);
    margin-top: 5px;
}

button:hover , #submit:hover, #bt_cliente:hover, #bt_fo:hover{
    background-color: rgb(255, 255, 255);
    border: 3px solid rgb(0, 170, 255);
    color:rgb(0, 170, 255);
}
