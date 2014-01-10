<?php
include 'header.tpl.php';
?>
<div id="content">
	<form id="listform" name="listform" action="/<?php echo $path?>/<?php echo $file?>/editorder/" method="post">
	<div id="box">
		<h3>导航列表</h3>
		<table width="100%">
			<thead>
				<tr>
					<th width="60"><a href="#">ID</a></th>
					<th><a href="#">排序</a></th>
					<th><a href="#">导航标题</a></th>
					<th><a href="#">导航类型</a></th>
					<th><a href="#">链接地址</a></th>
					<th><a href="#">目标位置</a></th>
					<th width="100px">管理</th>
				</tr>
			</thead>
			<tbody>
<?php 
foreach($info as $row) {
?>
				<tr>
					<td class="a-center"><input type="checkbox" value="<?php echo $row['nav_id']?>" name="ids[]"/> <?php echo $row['nav_id']?></td>
					<td><input type="text" name="orders[<?php echo $row['nav_id']?>]" value="<?php echo $row['sort_order']?>" size="4"/></td>
					<td><?php echo $row['nav_name']?></td>
					<td><?php echo $GLOBALS['user_config']['NAV_TYPE'][$row['nav_type']]?></td>
					<td><?php echo $row['url']?></td>
					<td><?php echo $GLOBALS['user_config']['TARGET'][$row['target']]?></td>
					<td><a href="/<?php echo $path?>/<?php echo $file?>/edit?navid=<?php echo $row['nav_id']?>"><img src="<?php echo ADMIN_IMAGE_DIR?>icons/edit.png" />编辑</a> | <a href="/<?php echo $path?>/<?php echo $file?>/delete?navid=<?php echo $row['nav_id']?>" onclick="return confirm('确认要删除[<?php echo $row['nav_name']?>]吗？')"><img src="<?php echo ADMIN_IMAGE_DIR?>icons/delete.png" />删除</a></td>
				</tr>
<?php
}
?>
			</tbody>
			<tfoot>
    			<tr>
    				<td colspan="8" align="left">
    					<div id="options">
    						<label for="check_button"><input id="check_button" type="checkbox" name="check_button" /> 全选/取消</label>&nbsp;
    						<label><input type="radio" checked="checked" value="/<?php echo $path?>/<?php echo $file?>/editorder" name="op"/>更新排序</label>&nbsp;
    						<label><input type="radio" value="/<?php echo $path?>/<?php echo $file?>/batchedit" name="op"/>批量修改</label>&nbsp;
    						<button class="button" value="yes" name="batch_submit" type="submit"> 提交操作 </button>
						</div>
					</td>
    			</tr>
			</tfoot>
		</table>
	</div>
	</form>
</div>
<script type="text/javascript" src="<?php echo ADMIN_JS_DIR?>common.js"></script>
<?php
include 'footer.tpl.php';
?>
