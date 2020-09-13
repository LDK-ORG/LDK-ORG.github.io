<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>ЧМ</title>

</head>

<body>

<form method="POST">
	<p>Метод Гаусса</p>
	<input type="text" name="i00">
	<input type="text" name="i01">
	<input type="text" name="i02">=
	<input type="text" name="i03"> <br>
	
	<input type="text" name="i10">
	<input type="text" name="i11">
	<input type="text" name="i12">=
	<input type="text" name="i13"> <br>
	
	<input type="text" name="i20">
	<input type="text" name="i21">
	<input type="text" name="i22">=
	<input type="text" name="i23"> <br>
	
	<input type="submit" name="calc" value="Расчет">
	<br>
	<?php
		if(isset($_POST['calc'])){
			$n=3;
			$m=3;
			$m+=1;
			/* float $matrix = new float [$n];
			for ($i=0; $i<$n; $i++)
				$matrix[$i] = new float [$m]; */
			
			//инициализируем
			for ($i = 0; $i<$n; $i++)
				for ($j = 0; $j<$m; $j++){
					$matrix[$i][$j]=$_POST['i'.$i.$j.''];
				}
			
			
			 //выводим массив
			echo "матрица: <br>";
			  for ($i=0; $i<$n; $i++)
			   {
				  for ($j=0; $j<$m; $j++)
					echo $matrix[$i][$j]. ',  ';
					echo "<br>";
			   }
			   
			//Метод Гаусса
			//Прямой ход, приведение к верхнетреугольному виду
						 
			for ($i=0; $i<$n; $i++)
			{
			   $tmp=$matrix[$i][$i];
		   	   for ($j=$n;$j>=$i;$j--)
				$matrix[$i][$j]/=$tmp;
		 	     for ($j=$i+1;$j<$n;$j++)
				 {
					$tmp=$matrix[$j][$i];
					for ($k=$n;$k>=$i;$k--)
					$matrix[$j][$k]-=$tmp*$matrix[$i][$k];
				
				 }
			} 
			
			//выводим массив
			echo "матрица (верхнетреугольный вид): <br>";
			  for ($i=0; $i<$n; $i++)
			   {
				  for ($j=0; $j<$m; $j++)
					if($j==3){
						echo ' = '.number_format($matrix[$i][$j], 3, ',', '');
					}else{
						echo number_format($matrix[$i][$j], 3, ',', ''). '   ';
					}
					echo "<br>";
			   }

			//обратный ход
			$xx[$n-1] = $matrix[$n-1][$n];
			 for ($i=$n-2; $i>=0; $i--)
			   {
				   $xx[$i] = $matrix[$i][$n];
				   for ($j=$i+1;$j<$n;$j++) 
					   $xx[$i]-=$matrix[$i][$j]*$xx[$j];
			   }
			   
			//Выводим решения
			$ii=0;
		    for ($i=0; $i<$n; $i++){
				$ii=$ii+1;
				echo 'X'.$ii.'= '.number_format($xx[$i], 3, ',', '').' <br>';
			}	
		}	
	?>
	<p>Обратная матрица</p>
	<input type="text" name="t00">
	<input type="text" name="t01">
	<input type="text" name="t02">
	<input type="text" name="t03"> <br>
	
	<input type="text" name="t10">
	<input type="text" name="t11">
	<input type="text" name="t12">
	<input type="text" name="t13"> <br>
	
	<input type="text" name="t20">
	<input type="text" name="t21">
	<input type="text" name="t22">
	<input type="text" name="t23"> <br>
	
	<input type="text" name="t30">
	<input type="text" name="t31">
	<input type="text" name="t32">
	<input type="text" name="t33"> <br>
	
	<input type="submit" name="calc_obr" value="Расчет">
	<br>
	<?php
		if(isset($_POST['calc_obr'])){
			$n=4;
			$m=4;
			//инициализируем
			for ($i = 0; $i<$n; $i++)
				for ($j = 0; $j<$m; $j++){
					$a[$i][$j]=$_POST['t'.$i.$j.''];
				}
			
			echo "матрица: <br>";
			  for ($i=0; $i<$n; $i++)
			   {
				  for ($j=0; $j<$m; $j++)
					echo number_format($a[$i][$j], 3, ',', ''). ',  ';
					echo "<br>";
			   }
			
			//расчеты
			$e = array(); 
			$count = count($a); 
			for($i = 0; $i < $count; $i++) 
			  for($j = 0; $j< $count; $j++) 
				$e[$i][$j] = ($i==$j) ? 1 : 0; 
					 
			for($i = 0; $i < $count; $i++)
			{ 
			  $tmp = $a[$i][$i]; 
			  for($j = $count - 1; $j >= 0; $j--)
			  { 
				$e[$i][$j] /= $tmp; 
				$a[$i][$j] /= $tmp; 
				
			  } 
				 
			  for($j = 0; $j < $count; $j++)
			  { 
				if($j != $i)
				{ 
				  $tmp = $a[$j][$i]; 
				  for($k = $count - 1; $k >= 0; $k--)
				  { 
					$e[$j][$k] -= $e[$i][$k]*$tmp; 
					$a[$j][$k] -= $a[$i][$k]*$tmp; 
				  } 
				} 
				
			  }
			  
			} 
			 
			echo "матрица обратная: <br>";
			  for ($i=0; $i<$n; $i++)
			   {
				  for ($j=0; $j<$m; $j++)
					echo number_format($e[$i][$j], 3, ',', ''). ',  ';
					echo "<br>";
			   }
			
		}
	?>
	
	<p>определитель матрицы</p>
	Введите размер матрицы<input type="text" id="z3" name="z3" size="10">
	<input type="button" name="b3" id="b3" class="b3" value="Создать"> <br><br>
	<div id="opr">
		
	</div>
	<input type="text" name="p00">
	<input type="text" name="p01">
	<input type="text" name="p02">
	<input type="text" name="p03"> <br>
	
	<input type="text" name="p10">
	<input type="text" name="p11">
	<input type="text" name="p12">
	<input type="text" name="p13"> <br>
	
	<input type="text" name="p20">
	<input type="text" name="p21">
	<input type="text" name="p22">
	<input type="text" name="p23"> <br>
	
	<input type="text" name="p30">
	<input type="text" name="p31">
	<input type="text" name="p32">
	<input type="text" name="p33"> <br>
	
	<input type="submit" name="calc_opr" value="Расчет">
	<br>
	<?php
		if(isset($_POST['calc_opr'])){
			$n=4;
			$m=4;
			//инициализируем
			for ($i = 0; $i<$n; $i++)
				for ($j = 0; $j<$m; $j++){
					$a[$i][$j]=$_POST['p'.$i.$j.''];
				}
			//расчет
			$p=0;
			for ($i=0; $i<$n-1; $i++)
			{
				$t=1;
				while($a[$i][$i]==0)
				{
					for($j=0; $j<$n; $j++)
					{
						$a[$i][$j]=$kst;
						$a[$i][$j]=$a[$i+$t][$j];
						$a[$i+$t][$j]=$kst;
					}
					$p++;
					$t++;
				}
				 
				for ($k=$i+1; $k<$n; $k++)
				{
					$kst=$a[$k][$i]/$a[$i][$i];
					for($j=0; $j<$n; $j++)
						$a[$k][$j]-=$a[$i][$j]*$kst;
				}
			}
			 
			$kst=pow(-1,$p);
			for($i=0; $i<$n; $i++)
				$kst*=$a[$i][$i];
			 
			echo "Определитель: ". $kst;
		}
	?>
	</form>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
	$('.b3').on('click', function(){
		if( !$('#z3').val() ) {                      
        alert('Введите размер матрици');   
		$('#z3').focus();
		}
		else{
			var kol=$('#z3').val();
			for (i=0;i<kol;i++){
				for (j=0;j<kol;j++){
					$('#opr').html("<input type=\"text\" name=\"p"+i+""+j+">");
				}
				$('#opr').html("<input type=\"text\" name=\"p"+i+"0>");
			}
		}
	});
</script>
</body>
</html>