<iframe 
    width="100%" height="598" 
    src="https://www.youtube.com/embed/0eI7-70KfC0" 
    title="YouTube video player" frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen >
</iframe>

<link rel="stylesheet" type="text/css" href="css/cssToastmess.css">
    <div id="toast"></div>

    <script>
        function toast({
            title='',
            message='', 
            type='info', 
            duration=5000
        }) {
            const main = document.getElementById('toast');
            if(main){
                const toast = document.createElement('div');

                //Auto remove toast
                const autoRemoveId = setTimeout(function(){
                    main.removeChild(toast)
                }, duration + 1000);

                //Remove toast when click
                toast.onclick = function(e){
                    if (e.target.closest('.toast__close')){
                        main.removeChild(toast);
                        clearTimeout(autoRemoveId);
                    }
                }

                const icons = {
                    success: 'fas fa-check-circle',
                    info: 'fas fa-info-circle',
                    warning: 'fas fa-exclamation-circle',
                    error: 'fas fa-exclamation-circle',
                };
                const icon = icons[type];
                const delay = (duration / 1000).toFixed(2);

                toast.classList.add('toast', `toast--${type}`);
                toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards;`;
                toast.innerHTML = `
            
                    <div class="toast__icon">
                        <i class="${icon}"></i>
                    </div>
                    <div class="toast__body">
                        <h3 class="toast__tittle">${title}</h3>
                        <p class="toast__msg">${message}</p>
            
                    </div>
                    <div class="toast__close">
                        <i class="fas fa-times"></i>
                    </div>
               
                `;   
                main.appendChild(toast);  


            }
        }

        toast({
            title:'Xin chào',
            message: 'Chúc bạn ngày mới tốt lành <3 !',
            type: 'success',
            duration: 5000
        });

    </script>






