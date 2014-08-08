<h1>Blog posts</h1>
<div >
<?php
    echo $this->Paginator->prev('« Previous ', null, null, array('class' => 'disabled')); //Shows the next and previous links
    echo " | ".$this->Paginator->numbers()." | "; //Shows the page numbers
    echo $this->Paginator->next(' Next »', null, null, array('class' => 'disabled')); //Shows the next and previous links
    echo " Page ".$this->Paginator->counter(); // prints X of Y, where X is current page and Y is number of pages
?>
<table id='postTable' >
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
        <th>Duplicate</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td ><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
                    array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Edit',
                    array('action' => 'edit', $post['Post']['id'])
                ); 
                  echo $this->Form->postLink('Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirmMessage' => 'Are you sure?')
                );
            ?>
            
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
        <td><input type='button' id=<?php echo $post['Post']['id']; ?> class='duplicate' value='Duplicate' ></input></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>

<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add')
); ?>
</div>

<script type="text/javascript">
$(function() {    
    $('.duplicate' ).click(function(e){
        if (confirm('Do you want to duplicate this post ?')) {
            e.preventDefault();
            var id = $(this).attr('id'); // table row ID 
            var myUrl = "posts/duplicate"; 
            $.ajax({
                url: myUrl,
                type: 'POST',
                data:{id: id },
                success: function(data, status){
                    newPost = jQuery.parseJSON(data).Post;
                        $("#postTable")
                            .append($('<tr>')
                                .append($('<td>')                                
                                    .text(newPost.id)                                    
                                ).append($('<td>')
                                    .append($('<a>')
                                        .attr('href','/cake/posts/view/'+newPost.id)
                                        .text(newPost.title)
                                    )
                                ).append($('<td>')
                                    .append($('<a>')
                                        .attr('href','/cake/posts/edit/'+newPost.id)
                                        .text('Edit')
                                    )
                                    .append($('<a>')
                                        .attr('href','/cake/posts/delete/'+newPost.id)
                                        .attr('confirm','Do you want to delete this post')
                                        .text('Delete')
                                    )
                                ).append($('<td>')
                                    .text(newPost.created)                                    
                                ).append($('<td>')
                                    .append($('<input>')
                                        .attr('type','button')
                                        .attr('id',newPost.id)
                                        .attr('value', 'Duplicate')
                                        .attr('class', 'duplicate')
                                    )                                                                    
                                )
                            );                
                        },
                error: function(data) {
                    console.log(data);
                }
            })
        };
        
    });

});
</script>