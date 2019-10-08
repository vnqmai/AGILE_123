<?php echo form_open('bill_detail/edit/'.$bill_detail['id']); ?>

	<div>
		ProductId : 
		<input type="text" name="productId" value="<?php echo ($this->input->post('productId') ? $this->input->post('productId') : $bill_detail['productId']); ?>" />
	</div>
	<div>
		Bill Id : 
		<input type="text" name="bill_id" value="<?php echo ($this->input->post('bill_id') ? $this->input->post('bill_id') : $bill_detail['bill_id']); ?>" />
	</div>
	<div>
		Status : 
		<input type="text" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $bill_detail['status']); ?>" />
	</div>
	<div>
		Description : 
		<textarea name="description"><?php echo ($this->input->post('description') ? $this->input->post('description') : $bill_detail['description']); ?></textarea>
	</div>
	
	<button type="submit">Save</button>
	
<?php echo form_close(); ?>