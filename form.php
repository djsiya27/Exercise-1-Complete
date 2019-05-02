<div class="hcf_box">
    <style scoped>
        
        .hcf_field{
            display: contents;
        }
    </style>
    <p class="meta-options hcf_field">
        <input id="hcf_metabox"
            type="text"
            name="hcf_metabox"
            
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'hcf_metabox', true ) ); ?>">
    </p>
    
</div>