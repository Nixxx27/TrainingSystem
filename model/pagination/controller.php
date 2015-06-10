<!--previous-->
		<?php $p =$page; ($p > 1)?$previous = $p-1:$previous =1?> 
			<a href="?page=<?php echo $previous?>&per-page=<?php echo $perPage ?>"> <i class="fa fa-chevron-circle-left fa-2x"></i></a>
		<!--next-->
		<?php $n =$page; ($n < $pages)?$next = $n+1:$next =$page;?> 
			<a href="?page=<?php echo $next?>&per-page=<?php echo $perPage ?>"> <i id="next" class="fa fa-chevron-circle-right fa-2x"></i></a>
		<!--Pagination number-->
		<p>
			<?php for($x = 1; $x <= $pages; $x++): ?>
			<a href="?page=<?php echo $x ?>&per-page=<?php echo $perPage ?>"
				<?php echo($page===$x)? "class='selected'" : "";?>
				><?php echo $x ?></a>
			<?php endfor; ?>
		</p>