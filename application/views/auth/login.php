
<div class="flex justify-center">

    <div class="bg-white rounded-lg w-6/12 p-4">

    <form id = "login_form">

        <div class="mb-4">
            <label for="username" class = "sr-only">Email</label>
            <input type="text" name = "username" id = "username" class = "bg-gray-200 p-4 w-full rounded-lg" placeholder="Username">
        </div>
        <div class="mb-4">
            <label for="password" class = "sr-only">Password</label>
            <input type="password" name = "password" id = "password" class = "bg-gray-200 p-4 w-full rounded-lg" placeholder="Password">
        </div>
        <div class="mb-2">
            <p class = "error text-red-500"></p>
        </div>

        <div class="mb-4">
            <button class = "bg-blue-500 py-3 px-4 text-white w-full rounded-lg">Login</button>
        </div>

    </form>
    </div>
</div>

<script>

    const form = document.querySelector('#login_form');
    const error = document.querySelector('.error');



    form.addEventListener('submit', async e => {

        e.preventDefault();

        const username = document.querySelector('#username').value.trim()
        const password = document.querySelector('#password').value.trim()

        await login(username, password)

    })

    const login = async (username, password) => {


        const url = "<?php echo base_url()?>login/store"

        try {
            
            const res = await fetch(`${url}`,{
                method: 'POST',
                body: JSON.stringify({
                    username, password
                }),
                headers: {"Content-Type": "application/json"},
            })

            const { success , message } = await res.json();

            //reload the page if success = true
            if(success) location.reload();

            //show the error
            error.innerText = message;
            
        } catch (error) {
            console.log(error);
        }
    }



</script>
