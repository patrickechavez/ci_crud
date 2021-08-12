

    <a href="<?php echo base_url() ?>posts/create" class = "btn rounded-lg bg-blue-500 text-white py-3 px-4">
        Add Post
    </a>


        <?php foreach ($posts as $post): ?>

            <div class="w-6/12 bg-white p-6 rounded-lg m-5 mx-auto">
                <a href="<?php echo base_url() ?>posts/edit/<?php echo $post['slug']; ?>">
                    <h2 class = "text-xl font-bold text-gray-900"><?php echo $post['title'] ?></h2>
                </a>

                <p class = "text-md text-gray-600">
                    <?php echo $post['body']; ?>
                </p>

            </div>

        <?php endforeach;?>




