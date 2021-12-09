<?php


  require "includes/config.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo TAGLINE; ?></title>
  <link rel="stylesheet" href="assets/styles/styles.css" />
</head>

<body>
<div>


</div>
  <div class="container">
    <header class="header">
      <div class="chatbot-info">
        <div class="chatbot-icon">
               </div>
        <div class="chatbot-name">
          <?php echo CHATBOT_NAME; ?>
        </div>
      </div>
      <div class="chatbot-close">
        <img src="assets/images/close.svg" alt="Close the Chatbot" />
      </div>
    </header>
  
    <main class="messages" id="chatbox">
    </main>
    <footer class="footer">
      <input type="text" class="input" id="textInput" name="messageInput" placeholder="Escriba un mensaje" autocomplete="off" />
      <button type="submit" class="submit" id="buttonInput" name="submit">
        <img src="assets/images/send.svg" alt="Send the message" />
      </button>
    </footer>
  </div>

  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <script>

    let chatbox = document.getElementById("chatbox");
    let messageForm = document.getElementById("messageForm");
    let message = document.getElementById("textInput");
    let send = document.getElementById("buttonInput");
    let userData = [];
    window.appointment_code = "";

    //  respuesta del chat
    const reply = (userMessage) => {
      if (userMessage === "1") {
        chatbox.innerHTML += `<div class='message-left'>Por favor ingrese su nombre.</div>`;

        chatbox.scrollTo({
          top: chatbox.scrollHeight,
          behavior: "smooth",
        });

        message.onkeyup = (e) => {
          if (e.key === "Enter" || e.keyCode === 13) {
            let userMessage = message.value;
            message.value = "";
            if (userMessage != "") {
              if (userMessage) {
                chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                chatbox.scrollTo({
                  top: chatbox.scrollHeight,
                  behavior: "smooth",
                });
                userData.push(userMessage);
                chatbox.innerHTML += `<div class='message-left'>Por favor ingrese su apellido.</div>`;
                chatbox.scrollTo({
                  top: chatbox.scrollHeight,
                  behavior: "smooth",
                });

                message.onkeyup = (e) => {
                  if (e.key === "Enter" || e.keyCode === 13) {
                    let userMessage = message.value;
                    message.value = "";
                    if (userMessage != "") {
                      if (userMessage) {
                        chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                        chatbox.scrollTo({
                          top: chatbox.scrollHeight,
                          behavior: "smooth",
                        });
                        userData.push(userMessage);
                        chatbox.innerHTML += `<div class='message-left'>Por favor ingrese su identificación.</div>`;
                        chatbox.scrollTo({
                          top: chatbox.scrollHeight,
                          behavior: "smooth",
                        });

                        message.onkeyup = (e) => {
                          if (e.key === "Enter" || e.keyCode === 13) {
                            let userMessage = message.value;
                            message.value = "";
                            if (userMessage != "") {
                              if (userMessage) {
                                chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                                chatbox.scrollTo({
                                  top: chatbox.scrollHeight,
                                  behavior: "smooth",
                                });
                                userData.push(userMessage);
                                chatbox.innerHTML += `<div class='message-left'>Por favor  ingrese su EPS a la que pertenece</div>`;
                                chatbox.scrollTo({
                                  top: chatbox.scrollHeight,
                                  behavior: "smooth",
                                });

                                message.onkeyup = (e) => {
                                  if (e.key === "Enter" || e.keyCode === 13) {
                                    let userMessage = message.value;
                                    message.value = "";
                                    if (userMessage != "") {
                                      if (userMessage) {
                                        chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                                        chatbox.scrollTo({
                                          top: chatbox.scrollHeight,
                                          behavior: "smooth",
                                        });
                                        userData.push(userMessage);
                                        chatbox.innerHTML += `<div class='message-left'>Por favor ingrese la URL de su autorización (Alojamiento remisión emitida por el médico)</div>`;
                                        chatbox.scrollTo({
                                          top: chatbox.scrollHeight,
                                          behavior: "smooth",
                                        });

                                        message.onkeyup = (e) => {
                                          if (
                                            e.key === "Enter" ||
                                            e.keyCode === 13
                                          ) {
                                            let userMessage = message.value;
                                            message.value = "";
                                            if (userMessage != "") {
                                              if (userMessage) {
                                                chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                                                chatbox.scrollTo({
                                                  top: chatbox.scrollHeight,
                                                  behavior: "smooth",
                                                });
                                                userData.push(userMessage);
                                                chatbox.innerHTML += `<div class='message-left'>Por favor ingrese su correo electrónico.</div>`;
                                                chatbox.scrollTo({
                                                  top: chatbox.scrollHeight,
                                                  behavior: "smooth",
                                                });

                                                message.onkeyup = (e) => {
                                                  if (
                                                    e.key === "Enter" ||
                                                    e.keyCode === 13
                                                  ) {
                                                    let userMessage = message.value;
                                                    message.value = "";
                                                    if (userMessage != "") {
                                                      if (userMessage) {
                                                        chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                                                        chatbox.scrollTo({
                                                          top: chatbox.scrollHeight,
                                                          behavior: "smooth",
                                                        });
                                                        userData.push(userMessage);
                                                        window.appointment_code = Math.floor(Math.random() * (999999 - 100000) + 100000);
                                                        chatbox.innerHTML += `<div class='message-left'>Su código de cita asignado es : ${window.appointment_code}, con este código podrá consultar la asignación de tu cita proximamente. </div>`;
                                                        chatbox.scrollTo({
                                                          top: chatbox.scrollHeight,
                                                          behavior: "smooth",
                                                        });
                                                        message.disabled = true;
                                                        userData.push(window.appointment_code);
                                                        $.ajax({
                                                          type: "POST",
                                                          data: {
                                                            name: userData[0],
                                                            surname: userData[1],
                                                            idno: userData[2],
                                                            healthservice: userData[3],
                                                            url: userData[4],
                                                            email: userData[5],
                                                            appointment_code: window.appointment_code
                                                          },
                                                          url: "createAppointment.php",
                                                          success: (data) => {
                                                            chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Recargar el bot</a></div>";
                                                          }
                                                        });
                                                      }
                                                    }
                                                  }
                                                };
                                              }
                                            }
                                          }
                                        };
                                      }
                                    }
                                  }
                                };
                              }
                            }
                          }
                        };
                      }
                    }
                  }
                };
              }
            }
          }
        };

        send.onclick = () => {
          let userMessage = message.value;
          message.value = "";
          if (userMessage != "") {
            if (userMessage) {
              chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
              chatbox.scrollTo({
                top: chatbox.scrollHeight,
                behavior: "smooth",
              });
              userData.push(userMessage);
              chatbox.innerHTML += `<div class='message-left'>Por favor ingrese su apellido.</div>`;
              chatbox.scrollTo({
                top: chatbox.scrollHeight,
                behavior: "smooth",
              });

              send.onclick = () => {
                let userMessage = message.value;
                message.value = "";
                if (userMessage != "") {
                  if (userMessage) {
                    chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                    chatbox.scrollTo({
                      top: chatbox.scrollHeight,
                      behavior: "smooth",
                    });
                    userData.push(userMessage);
                    chatbox.innerHTML += `<div class='message-left'>Por favor ingrese su identifiación.</div>`;
                    chatbox.scrollTo({
                      top: chatbox.scrollHeight,
                      behavior: "smooth",
                    });

                    send.onclick = () => {
                      let userMessage = message.value;
                      message.value = "";
                      if (userMessage != "") {
                        if (userMessage) {
                          chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                          chatbox.scrollTo({
                            top: chatbox.scrollHeight,
                            behavior: "smooth",
                          });
                          userData.push(userMessage);
                          chatbox.innerHTML += `<div class='message-left'>Por favor ingrese la EPS a la que pertenece.</div>`;
                          chatbox.scrollTo({
                            top: chatbox.scrollHeight,
                            behavior: "smooth",
                          });

                          send.onclick = () => {
                            let userMessage = message.value;
                            message.value = "";
                            if (userMessage != "") {
                              if (userMessage) {
                                chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                                chatbox.scrollTo({
                                  top: chatbox.scrollHeight,
                                  behavior: "smooth",
                                });
                                userData.push(userMessage);
                                chatbox.innerHTML += `<div class='message-left'>Por favor ingrese la URL de la autorización de la cita (Alojamiento remisión emitida por el médico)</div>`;
                                chatbox.scrollTo({
                                  top: chatbox.scrollHeight,
                                  behavior: "smooth",
                                });

                                send.onclick = () => {
                                  let userMessage = message.value;
                                  message.value = "";
                                  if (userMessage != "") {
                                    if (userMessage) {
                                      chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                                      chatbox.scrollTo({
                                        top: chatbox.scrollHeight,
                                        behavior: "smooth",
                                      });
                                      userData.push(userMessage);
                                      chatbox.innerHTML += `<div class='message-left'>Por favor ingrese su correo electronico</div>`;
                                      chatbox.scrollTo({
                                        top: chatbox.scrollHeight,
                                        behavior: "smooth",
                                      });

                                      send.onclick = () => {
                                        let userMessage = message.value;
                                        message.value = "";
                                        if (userMessage != "") {
                                          if (userMessage) {
                                            chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
                                            chatbox.scrollTo({
                                              top: chatbox.scrollHeight,
                                              behavior: "smooth",
                                            });
                                            userData.push(userMessage);
                                            window.appointment_code = Math.floor(Math.random() * (999999 - 100000) + 100000);
                                            chatbox.innerHTML += `<div class='message-left'>Su código de cita asignado es: ${window.appointment_code}, con este código podrá consultar la asignación de tu cita proximamente.</div>`;
                                            chatbox.scrollTo({
                                              top: chatbox.scrollHeight,
                                              behavior: "smooth",
                                            });
                                            message.disabled = true;
                                            userData.push(window.appointment_code);
                                            $.ajax({
                                              type: "POST",
                                              data: {
                                                name: userData[0],
                                                surname: userData[1],
                                                idno: userData[2],
                                                healthservice: userData[3],
                                                url: userData[4],
                                                email: userData[5],
                                                appointment_code: window.appointment_code
                                              },
                                              url: "createAppointment.php",
                                              success: (data) => {
                                                chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Recargar bot</a></div>";
                                              }
                                            });
                                          }
                                        }
                                      };
                                    }
                                  }
                                };
                              }
                            }
                          };
                        }
                      }
                    };
                  }
                }
              };
            }
          }
        };
      } else if (userMessage === "3") {
        chatbox.innerHTML += `<div class='message-left'>Por favor ingrese su identificación</div>`;

        chatbox.scrollTo({
          top: chatbox.scrollHeight,
          behavior: "smooth",
        });

        message.onkeyup = (e) => {
          if (e.key === "Enter" || e.keyCode === 13) {
            let userMessage = message.value;
            message.value = "";
            if (userMessage != "") {
              if (userMessage) {
                chatbox.innerHTML += `<div class='message-right'>${userMessage}<br /></div>`;
                chatbox.scrollTo({
                  top: chatbox.scrollHeight,
                  behavior: "smooth",
                });
                userData.push(parseInt(userMessage));
                window.appointment_code = parseInt(userMessage);
                $.ajax({
                  type: "GET",
                  url: `getCode.php?appointment_code=${window.appointment_code}`,
                  dataType: "JSON",
                  success: (response) => {
                    chatbox.innerHTML += `<div class='message-left'>¡Ya se programó su cita! <br />Especialista: ${response[2]}<br />Fecha: ${response[3]}<br />Hora: ${response[4]}<br /></div>`;
                    chatbox.scrollTo({
                      top: chatbox.scrollHeight,
                      behavior: "smooth",
                    });
                    chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Refrescar bot</a></div>";
                  },
                  error: () => {
                    chatbox.innerHTML += `<div class='message-left'>ssssssssssssssssLa cita se encuentra en trámite</div>`;
                    chatbox.scrollTo({
                      top: chatbox.scrollHeight,
                      behavior: "smooth",
                    });
                    chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Refrescar bot</a></div>";
                  }
                });

                message.disabled = true;
              }
            }
          }
        };

        send.onclick = () => {
          let userMessage = message.value;
          message.value = "";
          if (userMessage != "") {
            if (userMessage) {
              chatbox.innerHTML += `<div class='message-right'>${userMessage}<br /></div>`;
              chatbox.scrollTo({
                top: chatbox.scrollHeight,
                behavior: "smooth",
              });
              userData.push(parseInt(userMessage));
              window.appointment_code = parseInt(userMessage);
              $.ajax({
                type: "GET",
                url: `getAppointment.php?appointment_code=${window.appointment_code}`,
                dataType: "JSON",
                success: (response) => {
                  chatbox.innerHTML += `<div class='message-left'>¡Ya se programó su cita! <br />Especialista: ${response[2]}<br />Fecha: ${response[3]}<br />Hora: ${response[4]}<br /></div>`;
                  chatbox.scrollTo({
                    top: chatbox.scrollHeight,
                    behavior: "smooth",
                  });
                  chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Refrecar Bot</a></div>";
                },
                error: () => {
                  chatbox.innerHTML += `<div class='message-left'>La cita se encuentra en trámite</div>`;
                  chatbox.scrollTo({
                    top: chatbox.scrollHeight,
                    behavior: "smooth",
                  });
                  chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Refrescar Bot</a></div>";
                }
              });
            }
          }
        };


       
      } 
      
      else if (userMessage === "2") {
        chatbox.innerHTML += `<div class='message-left'>Ingrese el código de la cita que se le asignó</div>`;

        chatbox.scrollTo({
          top: chatbox.scrollHeight,
          behavior: "smooth",
        });

        message.onkeyup = (e) => {
          if (e.key === "Enter" || e.keyCode === 13) {
            let userMessage = message.value;
            message.value = "";
            if (userMessage != "") {
              if (userMessage) {
                chatbox.innerHTML += `<div class='message-right'>${userMessage}<br /></div>`;
                chatbox.scrollTo({
                  top: chatbox.scrollHeight,
                  behavior: "smooth",
                });
                userData.push(parseInt(userMessage));
                window.appointment_code = parseInt(userMessage);
                $.ajax({
                  type: "GET",
                  url: `getAppointment.php?appointment_code=${window.appointment_code}`,
                  dataType: "JSON",
                  success: (response) => {
                    chatbox.innerHTML += `<div class='message-left'>¡Ya se programó su cita! <br/>Epecialista: ${response[2]}<br />Fecha: ${response[3]}<br />Hora: ${response[4]}<br /></div>`;
                    chatbox.scrollTo({
                      top: chatbox.scrollHeight,
                      behavior: "smooth",
                    });
                    chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Refrescar bot</a></div>";
                  },
                  error: () => {
                    chatbox.innerHTML += `<div class='message-left'>La cita se encuentra en trámite</div>`;
                    chatbox.scrollTo({
                      top: chatbox.scrollHeight,
                      behavior: "smooth",
                    });
                    chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Refrescar bot</a></div>";
                  }
                });

                message.disabled = true;
              }
            }
          }
        };

        send.onclick = () => {
          let userMessage = message.value;
          message.value = "";
          if (userMessage != "") {
            if (userMessage) {
              chatbox.innerHTML += `<div class='message-right'>${userMessage}<br /></div>`;
              chatbox.scrollTo({
                top: chatbox.scrollHeight,
                behavior: "smooth",
              });
              userData.push(parseInt(userMessage));
              window.appointment_code = parseInt(userMessage);
              $.ajax({
                type: "GET",
                url: `getAppointment.php?appointment_code=${window.appointment_code}`,
                dataType: "JSON",
                success: (response) => {
                  chatbox.innerHTML += `<div class='message-left'>¡Ya se programó su cita! <br />Epecialista: ${response[2]}<br />Fecha: ${response[3]}<br />Hora: ${response[4]}<br /></div>`;
                  chatbox.scrollTo({
                    top: chatbox.scrollHeight,
                    behavior: "smooth",
                  });
                  chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Refrecar Bot</a></div>";
                },
                error: () => {
                  chatbox.innerHTML += `<div class='message-left'>La cita se encuentra en trámite</div>`;
                  chatbox.scrollTo({
                    top: chatbox.scrollHeight,
                    behavior: "smooth",
                  });
                  chatbox.innerHTML += "<div class='message-left'><a href='index.php'>Refrescar Bot</a></div>";
                }
              });
            }
          }
        };


       
      } 
      
      
     
      else {
        chatbox.innerHTML += `<div class='message-left'>Lo siento, no entiendo eso, ingresa una opción correcta</div>`;

        chatbox.scrollTo({
          top: chatbox.scrollHeight,
          behavior: "smooth",
        });
      }

      chatbox.scrollTo({
        top: chatbox.scrollHeight,
        behavior: "smooth",
      });
    };


    send.onclick = () => {
      let userMessage = message.value;
      message.value = "";
      if (userMessage != "") {
        chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
        chatbox.scrollTo({
          top: chatbox.scrollHeight,
          behavior: "smooth",
        });
        reply(userMessage);
      }
    };
    message.onkeyup = (e) => {
      if (e.key === "Enter" || e.keyCode === 13) {
        let userMessage = message.value;
        message.value = "";
        if (userMessage != "") {
          chatbox.innerHTML += `<div class="message-right">${userMessage}</div>`;
          chatbox.scrollTo({
            top: chatbox.scrollHeight,
            behavior: "smooth",
          });
          reply(userMessage);
        }
      }
    };

    // Iniciar la conversación
    chatbox.innerHTML += `<div class='message-left' style='font-weight: lighter !important;'>Hola, estoy conectado, ¿en qué puedo ayudarte? <b style='font-size: 16px !important;'><br>Ingrese 1</b>. Para programar su cita.<br> <b style='font-size: 16px !important;'>Ingrese 2</b>. Para verificar el estado de su cita.<br> <b style='font-size: 16px !important;'>Ingrese 3</b>. Para consultar la cita con su identificación</div>`;
  </script>
</body>

</html>