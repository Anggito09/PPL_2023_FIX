@extends("layouts.chat")
@section("body")
    <div class="flex items-center justify-between bg-secondary px-4 py-2 rounded-xl">
        <div class="flex items-center gap-2">
            <img
                src="{{$recipient->dp?"/".$recipient->dp:"/images/icon4.png"}}"
                class="w-12 h-12 object-cover rounded-full border-2 border-green bg-secondary">
            <h1 class="font-bold text-2xl italic">{{$recipient->name}}</h1>
        </div>
        <button class="material-symbols-outlined">more_vert</button>
    </div>
    <div class="h-[calc(100vh-25rem)] overflow-y-scroll py-4 flex flex-col gap-2" id="chat-ground">
    </div>
    <form method="post" action="/api/chat/{{$session->id}}"
          class="flex items-center border-2 border-green bg-white rounded-xl pe-2" id="chat-form">
        <input type="text" name="message" id="message" class="flex-grow bg-none border-none rounded-xl"
               placeholder="Masukan Pesan ...">
        <button class="material-symbols-outlined">send</button>
    </form>
    <script>
        const chats = [];
        $("#chat-form").submit(e => {
            e.preventDefault();
            pushChat();
        })

        function fetchallChat() {
            fetch('/fetchchat/{{$session->id}}').then(response => response.json())
                .then(result => {
                    result.forEach(r => {
                        chats.push(r);
                        if (r.user_id == {{auth()->id()}}) {
                            $("#chat-ground").append(`<div class="chat self-end">${r.message}<span class="text-xs font-bold self-end">${r.created_at.split("T")[1].split(".")[0].substring(0, 5)}</span></div>`);
                        } else {
                            $("#chat-ground").append(`<div class="chat self-start">${r.message}<span class="text-xs font-bold self-end">${r.created_at.split("T")[1].split(".")[0].substring(0, 5)}</span></div>`);
                        }
                        document.querySelector("#chat-ground").scrollTo(0, document.querySelector("#chat-ground").scrollHeight);
                    });
                });
        }

        fetchallChat();

        const intId = setInterval(() => {
            fetch(`/fetchchat/{{$session->id}}?time=${chats[chats.length - 1] ? chats[chats.length - 1].created_at : ""}`).then(response => response.json())
                .then(result => {
                    if (result.status === "OK") {
                        if (result) {
                            result.forEach(r => {
                                chats.push(r);
                                if (r.user_id == {{auth()->id()}}) {
                                    $("#chat-ground").append(`<div class="chat self-end">${r.message}<span class="text-xs font-bold self-end">${r.created_at.split("T")[1].split(".")[0].substring(0, 5)}</span></div>`);
                                } else {
                                    $("#chat-ground").append(`<div class="chat self-start">${r.message}<span class="text-xs font-bold self-end">${r.created_at.split("T")[1].split(".")[0].substring(0, 5)}</span></div>`);
                                }
                                document.querySelector("#chat-ground").scrollTo(0, document.querySelector("#chat-ground").scrollHeight);
                            });
                        }
                    } else {
                        clearInterval(intId);
                    }
                });
        }, 1000);

        function pushChat() {
            const message = $("#message").val();
            fetch('/pushchat/{{$session->id}}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': "{{csrf_token()}}"
                },
                body: JSON.stringify({
                    message
                })
            })
                .then(response => response.json())
                .then(result => {
                    chats.push(result);
                    $("#chat-ground").append(`<div class="chat self-end">${result.message}<span class="text-xs font-bold self-end">${result.created_at.split("T")[1].split(".")[0].substring(0, 5)}</span></div>`);
                    $("#message").val("");
                    document.querySelector("#chat-ground").scrollTo(0, document.querySelector("#chat-ground").scrollHeight);
                });
        }
    </script>
@stop
