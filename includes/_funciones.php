<?php
class Tupla{
	public $color = array();
	public $orien = array();
	function __construct($numeroTuplas){
		$this->color = array($numeroTuplas);
		$this->orien = array($numeroTuplas);
	}
}
class Central{
	public $tupla;
	function __construct(){
		$this->tupla = new Tupla(1);
	}
}
class Lateral{
	public $tupla;
	function __construct(){
		$this->tupla = new Tupla(2);
	}
}
class Esquina{
	public $tupla;
	function __construct(){
		$this->tupla = new Tupla(3);
	}
}
class Piezas{
	public $piezaCentral = array(6);
	public $piezaLateral = array(12);
	public $piezaEsquina = array(8);
	function __construct(){
		for ($i=0; $i < count($this->piezaCentral) ; $i++) { 
			$this->piezaCentral[$i] = new Central();
		}
		for ($i=0; $i < count($this->piezaLateral) ; $i++) { 
			$this->piezaLateral[$i] = new Lateral();
		}
		for ($i=0; $i < count($this->piezaEsquina) ; $i++) { 
			$this->piezaEsquina[$i] = new Esquina();
		}
	}
	public function quienCentral($orient){
		$esta = false;
		$color = ' ';
		$i=0;
		while ($i<count($this->piezaCentral)&&!$esta) {
			$j=0;
			while ($j<count($this->piezaCentral[$i]->tupla->orien)&&!$esta) {
				if ($this->piezaCentral[$i]->tupla->orien[$j]==$orient) {
					$esta = true;
					$color = $this->piezaCentral[$i]->tupla->color[$j];
				} else {
					$j++;
				}
			} 
			$i++;
		}
		return $color;
	}
	public function quienLateral($orient1,$orient2,$orientColor){
		$esta=false;$pos1=false;$pos2=false;
		$i=0;
		$color = ' ';
		while ($i<count($this->piezaLateral)&&!$esta) {
			$j=0;
			while ($j<count($this->piezaLateral[$i]->tupla->orien)&&!$pos1) {
				if ($this->piezaLateral[$i]->tupla->orien[$j]==$orient1) {
					$pos1=true;
				} else {
					$j++;
				}
			}
			$k=0;
			while ($k<count($this->piezaLateral[$i]->tupla->orien)&&!$pos2) {
				if ($this->piezaLateral[$i]->tupla->orien[$k]==$orient2) {
					$pos2 = true;
				} else {
					$k++;
				}
			}
			if ($pos1&&$pos2) {
				if ($orient1 == $orientColor) {
					$color = $this->piezaLateral[$i]->tupla->color[$j];
				}else{
					$color = $this->piezaLateral[$i]->tupla->color[$k];
				}
				$esta = true;
			} else {
				$pos1 = $pos2 = false;
				$i++;
			}
		}
		return $color;
	}
	public function quienEsquina($orient1,$orient2,$orient3,$orientColor){
		$esta=false;$pos1=false;$pos2=false;$pos3=false;
		$color = ' ';
		$i=0;
		while ($i<count($this->piezaEsquina)&&!$esta) {
			$j=0;
			while ($j<count($this->piezaEsquina[$i]->tupla->orien)&&!$pos1) {
				if ($this->piezaEsquina[$i]->tupla->orien[$j]==$orient1) {
					$pos1=true;
				} else {
					$j++;
				}
			}
			$k=0;
			while ($k<count($this->piezaEsquina[$i]->tupla->orien)&&!$pos2) {
				if ($this->piezaEsquina[$i]->tupla->orien[$k]==$orient2) {
					$pos2=true;
				} else {
					$k++;
				}
			}
			$l=0;
			while ($l<count($this->piezaEsquina[$i]->tupla->orien)&&!$pos3) {
				if ($this->piezaEsquina[$i]->tupla->orien[$l] == $orient3) {
					$pos3 = true;
				} else {
					$l++;
				}
			}
			if ($pos1&&$pos2&&$pos3) {
				if ($orient1 == $orientColor) {
					$color = $this->piezaEsquina[$i]->tupla->color[$j];
				} else if ($orient2 == $orientColor) {
					$color = $this->piezaEsquina[$i]->tupla->color[$k];
				} else{
					$color = $this->piezaEsquina[$i]->tupla->color[$l];
				}
				$esta = true;
			} else {
				$pos1=$pos2=$pos3=false;
				$i++;
			}
		}
		return $color;
	}
	public function iniciaPiezas(){
        $this->piezaCentral[0]->tupla->color[0] = 'R';
        $this->piezaCentral[0]->tupla->orien[0] = 'R';
        $this->piezaCentral[1]->tupla->color[0] = 'G';
        $this->piezaCentral[1]->tupla->orien[0] = 'F';
        $this->piezaCentral[2]->tupla->color[0] = 'W';
        $this->piezaCentral[2]->tupla->orien[0] = 'U';
        $this->piezaCentral[3]->tupla->color[0] = 'O';
        $this->piezaCentral[3]->tupla->orien[0] = 'L';
        $this->piezaCentral[4]->tupla->color[0] = 'Y';
        $this->piezaCentral[4]->tupla->orien[0] = 'D';
        $this->piezaCentral[5]->tupla->color[0] = 'B';
        $this->piezaCentral[5]->tupla->orien[0] = 'B';

        $this->piezaLateral[0]->tupla->color[0] = 'W';
        $this->piezaLateral[0]->tupla->orien[0] = 'U';
        $this->piezaLateral[0]->tupla->color[1] = 'G';
        $this->piezaLateral[0]->tupla->orien[1] = 'F';
        $this->piezaLateral[1]->tupla->color[0] = 'R';
        $this->piezaLateral[1]->tupla->orien[0] = 'R';
        $this->piezaLateral[1]->tupla->color[1] = 'G';
        $this->piezaLateral[1]->tupla->orien[1] = 'F';
        $this->piezaLateral[2]->tupla->color[0] = 'Y';
        $this->piezaLateral[2]->tupla->orien[0] = 'D';
        $this->piezaLateral[2]->tupla->color[1] = 'G';
        $this->piezaLateral[2]->tupla->orien[1] = 'F';
        $this->piezaLateral[3]->tupla->color[0] = 'O';
        $this->piezaLateral[3]->tupla->orien[0] = 'L';
        $this->piezaLateral[3]->tupla->color[1] = 'G';
        $this->piezaLateral[3]->tupla->orien[1] = 'F';
        $this->piezaLateral[4]->tupla->color[0] = 'W';
        $this->piezaLateral[4]->tupla->orien[0] = 'U';
        $this->piezaLateral[4]->tupla->color[1] = 'R';
        $this->piezaLateral[4]->tupla->orien[1] = 'R';
        $this->piezaLateral[5]->tupla->color[0] = 'W';
        $this->piezaLateral[5]->tupla->orien[0] = 'U';
        $this->piezaLateral[5]->tupla->color[1] = 'O';
        $this->piezaLateral[5]->tupla->orien[1] = 'L';
        $this->piezaLateral[6]->tupla->color[0] = 'Y';
        $this->piezaLateral[6]->tupla->orien[0] = 'D';
        $this->piezaLateral[6]->tupla->color[1] = 'R';
        $this->piezaLateral[6]->tupla->orien[1] = 'R';
        $this->piezaLateral[7]->tupla->color[0] = 'Y';
        $this->piezaLateral[7]->tupla->orien[0] = 'D';
        $this->piezaLateral[7]->tupla->color[1] = 'O';
        $this->piezaLateral[7]->tupla->orien[1] = 'L';
        $this->piezaLateral[8]->tupla->color[0] = 'W';
        $this->piezaLateral[8]->tupla->orien[0] = 'U';
        $this->piezaLateral[8]->tupla->color[1] = 'B';
        $this->piezaLateral[8]->tupla->orien[1] = 'B';
        $this->piezaLateral[9]->tupla->color[0] = 'O';
        $this->piezaLateral[9]->tupla->orien[0] = 'L';
        $this->piezaLateral[9]->tupla->color[1] = 'B';
        $this->piezaLateral[9]->tupla->orien[1] = 'B';
        $this->piezaLateral[10]->tupla->color[0] = 'R';
        $this->piezaLateral[10]->tupla->orien[0] = 'R';
        $this->piezaLateral[10]->tupla->color[1] = 'B';
        $this->piezaLateral[10]->tupla->orien[1] = 'B';
        $this->piezaLateral[11]->tupla->color[0] = 'Y';
        $this->piezaLateral[11]->tupla->orien[0] = 'D';
        $this->piezaLateral[11]->tupla->color[1] = 'B';
        $this->piezaLateral[11]->tupla->orien[1] = 'B';

        $this->piezaEsquina[0]->tupla->color[0] = 'W';
        $this->piezaEsquina[0]->tupla->orien[0] = 'U';
        $this->piezaEsquina[0]->tupla->color[1] = 'G';
        $this->piezaEsquina[0]->tupla->orien[1] = 'F';
        $this->piezaEsquina[0]->tupla->color[2] = 'R';
        $this->piezaEsquina[0]->tupla->orien[2] = 'R';
        $this->piezaEsquina[1]->tupla->color[0] = 'W';
        $this->piezaEsquina[1]->tupla->orien[0] = 'U';
        $this->piezaEsquina[1]->tupla->color[1] = 'G';
        $this->piezaEsquina[1]->tupla->orien[1] = 'F';
        $this->piezaEsquina[1]->tupla->color[2] = 'O';
        $this->piezaEsquina[1]->tupla->orien[2] = 'L';
        $this->piezaEsquina[2]->tupla->color[0] = 'Y';
        $this->piezaEsquina[2]->tupla->orien[0] = 'D';
        $this->piezaEsquina[2]->tupla->color[1] = 'G';
        $this->piezaEsquina[2]->tupla->orien[1] = 'F';
        $this->piezaEsquina[2]->tupla->color[2] = 'R';
        $this->piezaEsquina[2]->tupla->orien[2] = 'R';
        $this->piezaEsquina[3]->tupla->color[0] = 'Y';
        $this->piezaEsquina[3]->tupla->orien[0] = 'D';
        $this->piezaEsquina[3]->tupla->color[1] = 'G';
        $this->piezaEsquina[3]->tupla->orien[1] = 'F';
        $this->piezaEsquina[3]->tupla->color[2] = 'O';
        $this->piezaEsquina[3]->tupla->orien[2] = 'L';
        $this->piezaEsquina[4]->tupla->color[0] = 'W';
        $this->piezaEsquina[4]->tupla->orien[0] = 'U';
        $this->piezaEsquina[4]->tupla->color[1] = 'R';
        $this->piezaEsquina[4]->tupla->orien[1] = 'R';
        $this->piezaEsquina[4]->tupla->color[2] = 'B';
        $this->piezaEsquina[4]->tupla->orien[2] = 'B';
        $this->piezaEsquina[5]->tupla->color[0] = 'W';
        $this->piezaEsquina[5]->tupla->orien[0] = 'U';
        $this->piezaEsquina[5]->tupla->color[1] = 'O';
        $this->piezaEsquina[5]->tupla->orien[1] = 'L';
        $this->piezaEsquina[5]->tupla->color[2] = 'B';
        $this->piezaEsquina[5]->tupla->orien[2] = 'B';
        $this->piezaEsquina[6]->tupla->color[0] = 'Y';
        $this->piezaEsquina[6]->tupla->orien[0] = 'D';
        $this->piezaEsquina[6]->tupla->color[1] = 'R';
        $this->piezaEsquina[6]->tupla->orien[1] = 'R';
        $this->piezaEsquina[6]->tupla->color[2] = 'B';
        $this->piezaEsquina[6]->tupla->orien[2] = 'B';
        $this->piezaEsquina[7]->tupla->color[0] = 'Y';
        $this->piezaEsquina[7]->tupla->orien[0] = 'D';
        $this->piezaEsquina[7]->tupla->color[1] = 'O';
        $this->piezaEsquina[7]->tupla->orien[1] = 'L';
        $this->piezaEsquina[7]->tupla->color[2] = 'B';
        $this->piezaEsquina[7]->tupla->orien[2] = 'B';
    }
    public function imprimePiezas() {
        echo "    ".$this->quienEsquina('U', 'L', 'B', 'U').$this->quienLateral('U', 'B', 'U').$this->quienEsquina('U', 'R', 'B', 'U')."<br>";
        echo "    ".$this->quienLateral('U', 'L', 'U').$this->quienCentral('U').$this->quienLateral('U', 'R', 'U')."<br>";
        echo "    ".$this->quienEsquina('U', 'F', 'L', 'U').$this->quienLateral('U', 'F', 'U').$this->quienEsquina('U', 'F', 'R', 'U')."<br>";
        echo "".$this->quienEsquina('L', 'U', 'B', 'L').$this->quienLateral('L', 'U', 'L').$this->quienEsquina('L', 'U', 'F', 'L')." ";
        echo "".$this->quienEsquina('F', 'U', 'L', 'F').$this->quienLateral('F', 'U', 'F').$this->quienEsquina('F', 'U', 'R', 'F')." ";
        echo "".$this->quienEsquina('F', 'U', 'R', 'R').$this->quienLateral('R', 'U', 'R').$this->quienEsquina('R', 'U', 'B', 'R')." ";
        echo "".$this->quienEsquina('B', 'U', 'R', 'B').$this->quienLateral('B', 'U', 'B').$this->quienEsquina('B', 'U', 'L', 'B')." "."<br>";
        echo "".$this->quienLateral('L', 'B', 'L').$this->quienCentral('L').$this->quienLateral('L', 'F', 'L')." ";
        echo "".$this->quienLateral('L', 'F', 'F').$this->quienCentral('F').$this->quienLateral('F', 'R', 'F')." ";
        echo "".$this->quienLateral('F', 'R', 'R').$this->quienCentral('R').$this->quienLateral('R', 'B', 'R')." ";
        echo "".$this->quienLateral('R', 'B', 'B').$this->quienCentral('B').$this->quienLateral('L', 'B', 'B')." "."<br>";
        echo "".$this->quienEsquina('L', 'D', 'B', 'L').$this->quienLateral('L', 'D', 'L').$this->quienEsquina('L', 'D', 'F', 'L')." ";
        echo "".$this->quienEsquina('F', 'D', 'L', 'F').$this->quienLateral('F', 'D', 'F').$this->quienEsquina('F', 'D', 'R', 'F')." ";
        echo "".$this->quienEsquina('F', 'D', 'R', 'R').$this->quienLateral('R', 'D', 'R').$this->quienEsquina('R', 'D', 'B', 'R')." ";
        echo "".$this->quienEsquina('B', 'D', 'R', 'B').$this->quienLateral('B', 'D', 'B').$this->quienEsquina('B', 'D', 'L', 'B')." "."<br>";
        echo "    ".$this->quienEsquina('D', 'L', 'F', 'D').$this->quienLateral('D', 'F', 'D').$this->quienEsquina('D', 'F', 'R', 'D')."<br>";
        echo "    ".$this->quienLateral('D', 'L', 'D').$this->quienCentral('D').$this->quienLateral('D', 'R', 'D')."<br>";
        echo "    ".$this->quienEsquina('D', 'L', 'B', 'D').$this->quienLateral('D', 'B', 'D').$this->quienEsquina('D', 'R', 'B', 'D')."<br>";
        echo "";
    }
    public function movimiento($cara, $signo){
        $movsH = array('F','L','B','R');
        $movsV = array('F','U','B','D');
        $movsP = array('U','R','D','L');
        $movs = array(' ',' ',' ',' ');
        $opuesto = false;
        if($cara=='L'||$cara=='D'||$cara=='B')
            $opuesto = true;
        if($cara=='U'||$cara=='D'){
            for($a=0;$a<count($movs);$a++){
                $movs[$a] = $movsH[$a];
            }
        } else if($cara=='R'||$cara=='L'){
            for($a=0;$a<count($movs);$a++){
                $movs[$a] = $movsV[$a];
            }
        } else if($cara=='F'||$cara=='B'){
            for($a=0;$a<count($movs);$a++){
                $movs[$a] = $movsP[$a];
            }
        }
        for($i=0;$i<count($this->piezaLateral);$i++){
            for($j=0;$j<count($this->piezaLateral[$i]->tupla->orien);$j++){
                if($this->piezaLateral[$i]->tupla->orien[$j]==$cara){
                    for($k=0;$k<count($this->piezaLateral[$i]->tupla->orien);$k++){
                        if($this->piezaLateral[$i]->tupla->orien[$k]!=$cara){
                            $caraActual = $this->piezaLateral[$i]->tupla->orien[$k];
                            $caraNueva = 0;
                            while($caraActual != $movs[$caraNueva])
                                $caraNueva++;
                            if(($signo==0&&$opuesto==false)||($signo==1&&$opuesto==true))
                                $caraNueva++;
                            else if(($signo==1&&$opuesto==false)||($signo==0&&$opuesto==true))
                                $caraNueva--;
                            if($caraNueva<0)
                                $caraNueva = 3;
                            else if($caraNueva>3)
                                $caraNueva = 0;
                            $this->piezaLateral[$i]->tupla->orien[$k] = $movs[$caraNueva];
                        }
                    }
                }
            }
        }
        for($i=0;$i<count($this->piezaEsquina);$i++){
            for($j=0;$j<count($this->piezaEsquina[$i]->tupla->orien);$j++){
                if($this->piezaEsquina[$i]->tupla->orien[$j]==$cara){
                    for($k=0;$k<count($this->piezaEsquina[$i]->tupla->orien);$k++){
                        if($this->piezaEsquina[$i]->tupla->orien[$k]!=$cara){
                            $caraActual = $this->piezaEsquina[$i]->tupla->orien[$k];
                            $caraNueva = 0;
                            while($caraActual != $movs[$caraNueva])
                                $caraNueva++;
                            if(($signo==0&&$opuesto==false)||($signo==1&&$opuesto==true))
                                $caraNueva++;
                            else if(($signo==1&&$opuesto==false)||($signo==0&&$opuesto==true))
                                $caraNueva--;
                            if($caraNueva<0)
                                $caraNueva = 3;
                            else if($caraNueva>3)
                                $caraNueva = 0;
                            $this->piezaEsquina[$i]->tupla->orien[$k] = $movs[$caraNueva];
                        }
                    }
                }
            }
        }
    }
    public function scramble(){
    	$cadena = " ";
    	$gen = array();
    	for ($i=0;$i<25;$i++) { 
    		$gen[$i]=" ";
    	}
    	$rand;
    	for ($i=0;$i<count($gen);$i++) {
    		$rand=rand(0,5);
    		$gen[$i]=$rand;
    		if ($i!=0&&$gen[$i]==$gen[$i-1]) {
    			$rand=rand(0,5);
    			$gen[$i]=$rand;
    			$i--;
    		}
    	}
    	echo "<br>";
    	// for ($i=0;$i<count($gen);$i++) { 
    	// 	echo $gen[$i]." ";
    	// }
    	// echo "<br>";
    	$r;$ran;
    	for ($i=0;$i<count($gen);$i++) { 
    		switch ($gen[$i]) {
    			case 0:
    				$ran = rand(0,2);
    				$r=$ran;
    				switch ($r) {
    					case 0:
    						$cadena.="U ";
    						$this->movimiento('U',0);
    						break;
    					case 1:
    						$cadena.="U' ";
    						$this->movimiento('U',1);
    						break;
    					case 2:
    						$cadena.="U2 ";
    						$this->movimiento('U',0);
    						$this->movimiento('U',0);
    						break;
    				}
    				break;
    			case 1:
    				$ran = rand(0,2);
    				$r=$ran;
    				switch ($r) {
    					case 0:
    						$cadena.="D ";
    						$this->movimiento('D',0);
    						break;
    					case 1:
    						$cadena.="D' ";
    						$this->movimiento('D',1);
    						break;
    					case 2:
    						$cadena.="D2 ";
    						$this->movimiento('D',0);
    						$this->movimiento('D',0);
    						break;
    				}
    				break;
    			case 2:
    				$ran = rand(0,2);
    				$r=$ran;
    				switch ($r) {
    					case 0:
    						$cadena.="R ";
    						$this->movimiento('R',0);
    						break;
    					case 1:
    						$cadena.="R' ";
    						$this->movimiento('R',1);
    						break;
    					case 2:
    						$cadena.="R2 ";
    						$this->movimiento('R',0);
    						$this->movimiento('R',0);
    						break;
    				}
    				break;
    			case 3:
    				$ran = rand(0,2);
    				$r=$ran;
    				switch ($r) {
    					case 0:
    						$cadena.="L ";
    						$this->movimiento('L',0);
    						break;
    					case 1:
    						$cadena.="L' ";
    						$this->movimiento('L',1);
    						break;
    					case 2:
    						$cadena.="L2 ";
    						$this->movimiento('L',0);
    						$this->movimiento('L',0);
    						break;
    				}
    				break;
    			case 4:
    				$ran = rand(0,2);
    				$r=$ran;
    				switch ($r) {
    					case 0:
    						$cadena.="F ";
    						$this->movimiento('F',0);
    						break;
    					case 1:
    						$cadena.="F' ";
    						$this->movimiento('F',1);
    						break;
    					case 2:
    						$cadena.="F2 ";
    						$this->movimiento('F',0);
    						$this->movimiento('F',0);
    						break;
    				}
    				break;
    			case 5:
    				$ran = rand(0,2);
    				$r=$ran;
    				switch ($r) {
    					case 0:
    						$cadena.="B ";
    						$this->movimiento('B',0);
    						break;
    					case 1:
    						$cadena.="B' ";
    						$this->movimiento('B',1);
    						break;
    					case 2:
    						$cadena.="B2 ";
    						$this->movimiento('B',0);
    						$this->movimiento('B',0);
    						break;
    				}
    				break;
    		}
    	}
    echo $cadena."<br>";
    }
}
$cubo = new Piezas();
global $cubo;
$cubo->iniciaPiezas();
switch ($_POST["accion"]) {
	case 'scramble':
		$cubo->scramble();
		// $cubo->imprimePiezas();
		break;
	case 'imprimir':
		// $cubo->imprimePiezas();
		break;
	default:
		# code...
		break;
}
?>