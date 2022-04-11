//const _SERVIDORgt = "http://www.esmonserrate.org/";

const _SERVIDORch=  window.location.protocol + "//" + window.location.host + "/";

const renderChat = async () => {

  //console.log("ver");
  const response = await fetch(_SERVIDORch +`public/chat/listaMensagens`)
  const lv = await response.json()
  //console.log(lv) 
   let strHtml = `
                `
   let foto
   let last=-1
   let msgForRead=0
  //alert("bbb");
  for (const l of lv) {
    if (l.senderFoto!=""){
      foto=l.senderFoto; 
    }else{
      foto="/templates/AdminLTE/dist/img/user.png";
    }
    if (l.idSender==l.idLog){
      //I'm the sender
      if (l.noRead==1){
        txt=`<small class="badge badge-info" ><i class="far fa-clock"></i>Ainda não lido</small>`;
      }else{
        txt="";
      }
       strHtml += `
                     <div class="direct-chat-msg">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">${l.sender} -> ${l.destination}</span>
                        <span class="direct-chat-timestamp float-right">${l.dateTime}</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="${foto}" alt="${l.sender}">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        ${l.msg}   ${txt}
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                `
    }else{
      //I'm the destination
      if (last==-1){
        last=l.idSender;
      }
      msgForRead+=l.noRead*1;
      if (l.noRead==1){
        txt=`<small class="badge badge-info" onClick="read(${l.id})"><i class="far fa-clock"></i>Novo</small>`;
      }else{
        txt="";
      }
      strHtml += `
                     <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">${l.sender}</span>
                        <span class="direct-chat-timestamp float-left">${l.dateTime}</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="${foto}" alt="${l.sender}">
                      
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      
                         ${l.msg}  ${txt}
                      </div>
                      <!-- /.direct-chat-text -->
                    
                    </div>
                `
    }
    
    
    
    

  
  }
  document.getElementById("chatTxt").innerHTML = strHtml
  document.getElementById("chatTxtDest").value = last
  //alert(msgForRead);
  document.getElementById("chatTxtNewMsg").innerHTML = msgForRead
}

const renderDestinatarios = async () => {

  //console.log("ver");
  const response = await fetch(_SERVIDORch +`public/users/lista`)
  const lv = await response.json()
  //console.log(lv) 
   let strHtml = `
              <option value=-1>... Seleciona um destinatário</option>
                `
  //alert("bbb");
  for (const l of lv) {
       strHtml += `
                     <option value='${l.id}'>${l.name}</option>
                `
  }
  document.getElementById("chatTxtDest").innerHTML = strHtml
}

const addMsg = async () => {

  let idD=document.getElementById("chatTxtDest").value 
  let msg=document.getElementById("chatTxtMsg").value 
  //alert(`idD=${idD}&msg=${msg}`);
  //console.log("aqui");
      //console.log(px);
      const response = await fetch(_SERVIDORch +`public/chat/addMsg`, {
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                    },
                method: "POST",
                body: `idD=${idD}&msg=${msg}`
            })
      renderChat();
  document.getElementById("chatTxtMsg").value=""
}

const read = async (id) => {

  let idD=document.getElementById("chatTxtDest").value 
  let msg=document.getElementById("chatTxtMsg").value 
  //alert(`idD=${idD}&msg=${msg}`);
  //console.log("aqui");
      //console.log(px);
  //alert(_SERVIDORch +`public/chat/read/${id}`)
      const response = await fetch(_SERVIDORch +`public/chat/read/${id}`)
      renderChat();
  //document.getElementById("chatTxtMsg").value=""
}

const renderChatNews = async () => {

  //console.log("ver");
  //alert(_SERVIDORch +`public/chat/news`)
  const response = await fetch(_SERVIDORch +`public/chat/news`)
  const lv = await response.json()
  //console.log(lv) 
  //alert("bbb");
  let novas=document.getElementById("chatTxtNewMsg").innerHTML
  for (const l of lv) {
      if (l.news>novas){
        novas=l.news
        renderChat();
      }
  }
  document.getElementById("chatTxtNewMsg1").innerHTML = novas
}
