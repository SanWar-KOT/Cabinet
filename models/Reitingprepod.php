<?php
namespace app\models;
use Yii;
use yii\base\Model;
class Reitingprepod extends \yii\db\ActiveRecord
{
	 /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reitingprepod';
    }
	 /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'kafedra', 'yearrs'], 'required'],
            [['login', 'kafedra', 'yearrs'], 'string', 'max' => 255],
			[['stavka', 'audit_nagruz', 'punkt11', 'punkt12', 'punkt13', 'punkt14', 'punkt15', 'punkt16', 'punkt17', 'reitingP', 'punkt211', 'punkt212', 'punkt213', 'punkt214', 'punkt215', 'punkt216', 'punkt217', 'punkt218', 'punkt219', 'punkt2110', 'punkt2111a', 'punkt2111b', 'punkt221', 'punkt222a', 'punkt222b', 'punkt222c', 'punkt222d', 'punkt223', 'punkt224', 'punkt225', 'punkt226a', 'punkt226b', 'punkt227', 'punkt228a', 'punkt228b', 'punkt229', 'punkt2210', 'punkt2211', 'punkt231', 'punkt232a', 'punkt232b', 'punkt232c', 'punkt232d', 'punkt233', 'punkt234', 'punkt235', 'punkt236', 'punkt237', 'punkt238', 'punkt239', 'punkt2310', 'punkt2311', 'punkt2312', 'punkt2313', 'punkt241a', 'punkt241b', 'punkt241c', 'punkt241d', 'punkt241e', 'punkt251', 'punkt252', 'punkt253', 'punkt254', 'punkt255', 'punkt256', 'punkt257', 'punkt258', 'punkt259', 'punkt2510', 'punkt261', 'punkt262', 'punkt263', 'punkt264a', 'punkt264b', 'punkt264c', 'punkt264d', 'punkt264e', 'punkt271', 'punkt272', 'punkt273', 'punkt274', 'reitingA', 'rz', 'itog'], 'double', 'message' => 'Должно быть число']
        ];}
		
    public function updateReiting()
    {
        $Reitingprepod->login = Yii::$app->user->identity->FIO;
        $Reitingprepod->kafedra = $this->kafedra;
		$Reitingprepod->yearrs = $this->yearrs;
		$Reitingprepod->stavka = $this->stavka;
		$Reitingprepod->audit_nagruz = $this->audit_nagruz;
		$Reitingprepod->punkt11 = $this->punkt11;
		$Reitingprepod->punkt12 = $this->punkt12;
		$Reitingprepod->punkt13 = $this->punkt13;
		$Reitingprepod->punkt14 = $this->punkt14;
		$Reitingprepod->punkt15 = $this->punkt15;
		$Reitingprepod->punkt16 = $this->punkt16;
		$Reitingprepod->punkt17 = $this->punkt17;
		$Reitingprepod->reitingP = $this->reitingP;
		$Reitingprepod->punkt211 = $this->punkt211;
		$Reitingprepod->punkt212 = $this->punkt212;
		$Reitingprepod->punkt213 = $this->punkt213;
		$Reitingprepod->punkt214 = $this->punkt214;
		$Reitingprepod->punkt215 = $this->punkt215;
		$Reitingprepod->punkt216 = $this->punkt216;
		$Reitingprepod->punkt217 = $this->punkt217;
		$Reitingprepod->punkt218 = $this->punkt218;
		$Reitingprepod->punkt219 = $this->punkt219;
		$Reitingprepod->punkt2110 = $this->punkt2110;
		$Reitingprepod->punkt2111a = $this->punkt2111a;
		$Reitingprepod->punkt2111b = $this->punkt2111b;
		$Reitingprepod->punkt221 = $this->punkt221;
		$Reitingprepod->punkt222a = $this->punkt222a;
		$Reitingprepod->punkt222b = $this->punkt222b;
		$Reitingprepod->punkt222c = $this->punkt222c;
		$Reitingprepod->punkt222d = $this->punkt222d;
		$Reitingprepod->punkt223 = $this->punkt223;
		$Reitingprepod->punkt224 = $this->punkt224;
		$Reitingprepod->punkt225 = $this->punkt225;
		$Reitingprepod->punkt226a = $this->punkt226a;
		$Reitingprepod->punkt226b = $this->punkt226b;
		$Reitingprepod->punkt227 = $this->punkt227;
		$Reitingprepod->punkt228a = $this->punkt228a;
		$Reitingprepod->punkt228b = $this->punkt228b;
		$Reitingprepod->punkt229 = $this->punkt229;
		$Reitingprepod->punkt2210 = $this->punkt2210;
		$Reitingprepod->punkt2211 = $this->punkt2211;
		$Reitingprepod->punkt231 = $this->punkt231;
		$Reitingprepod->punkt232a = $this->punkt232a;
		$Reitingprepod->punkt232b = $this->punkt232b;
		$Reitingprepod->punkt232c = $this->punkt232c;
		$Reitingprepod->punkt232d = $this->punkt232d;
		$Reitingprepod->punkt233 = $this->punkt233;
		$Reitingprepod->punkt234 = $this->punkt234;
		$Reitingprepod->punkt235 = $this->punkt235;
		$Reitingprepod->punkt236 = $this->punkt236;
		$Reitingprepod->punkt237 = $this->punkt237;
		$Reitingprepod->punkt238 = $this->punkt238;
		$Reitingprepod->punkt239 = $this->punkt239;
		$Reitingprepod->punkt2310 = $this->punkt2310;
		$Reitingprepod->punkt2311 = $this->punkt2311;
		$Reitingprepod->punkt2312 = $this->punkt2312;
		$Reitingprepod->punkt2313 = $this->punkt2313;
		$Reitingprepod->punkt241a = $this->punkt241a;
		$Reitingprepod->punkt241b = $this->punkt241b;
		$Reitingprepod->punkt241c = $this->punkt241c;
		$Reitingprepod->punkt241d = $this->punkt241d;
		$Reitingprepod->punkt241e = $this->punkt241e;
		$Reitingprepod->punkt251 = $this->punkt251;
		$Reitingprepod->punkt252 = $this->punkt252;
		$Reitingprepod->punkt253 = $this->punkt253;
		$Reitingprepod->punkt254 = $this->punkt254;
		$Reitingprepod->punkt255 = $this->punkt255;
		$Reitingprepod->punkt256 = $this->punkt256;
		$Reitingprepod->punkt257 = $this->punkt257;
		$Reitingprepod->punkt258 = $this->punkt258;
		$Reitingprepod->punkt259 = $this->punkt259;
		$Reitingprepod->punkt2510 = $this->punkt2510;
		$Reitingprepod->punkt261 = $this->punkt261;
		$Reitingprepod->punkt262 = $this->punkt262;
		$Reitingprepod->punkt263 = $this->punkt263;
		$Reitingprepod->punkt264a = $this->punkt264a;
		$Reitingprepod->punkt264b = $this->punkt264b;
		$Reitingprepod->punkt264c = $this->punkt264c;
		$Reitingprepod->punkt264d = $this->punkt264d;
		$Reitingprepod->punkt264e = $this->punkt264e;
		$Reitingprepod->punkt271 = $this->punkt271;
		$Reitingprepod->punkt272 = $this->punkt272;
		$Reitingprepod->punkt273 = $this->punkt273;
		$Reitingprepod->punkt274 = $this->punkt274;
		$Reitingprepod->reitingA = $this->reitingA;
		$Reitingprepod->rz = $this->rz;
		$Reitingprepod->itog = $this->itog;
        return $Reitingprepod->save()? true : false;
    }
	
}