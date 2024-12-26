<?php

namespace App\Http\Controllers;
use Inertia\Inertia; //ใส้Inertia
use Illuminate\Http\Request;
//สร้าง php artisan make:controller ProductController -rm
class ProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'Tulip', 'description' => 'ทิวลิป เป็นดอกไม้ที่มีความสวยงาม สีสันสดใส เปี่ยมไปด้วยเสน่ห์ และความหมายอันลึกซึ้งเป็นสัญลักษณ์ของ ความรัก ความสุข และความโชคดี', 'price' => 299, 'image' => '/images/1.jpg'],
        ['id' => 2, 'name' => 'Cosmea', 'description' => 'คอสมอส เป็นตัวแทนของความไม่มีที่สิ้นสุด ความเป็นระเบียบและความกลมกลืน ความงาม ความเป็นอิสระ ความแข็งแกร่ง และความกรุณา', 'price' => 300, 'image' => '/images/2.jpg'],
        ['id' => 3, 'name' => 'Yebira', 'description' => 'เยอบีร่า มีด้วยกันสองความหมายคือ ความบริสุทธิ์ไร้เดียงสา กับ ความเข้มแข็ง จึงแปลความมาได้ หมายถึง “จิตใจที่บริสุทธิ์ไร้เดียงสาแต่แฝงไว้ด้วยความเข้มแข็ง” หรือ “เธอคือแสงอาทิตย์ แห่งชีวิตฉัน”', 'price' => 150, 'image' => '/images/3.webp'],
        ['id' => 4, 'name' => 'Carnation', 'description' => 'คาร์เนชั่น เป็นสัญลักษณ์ของดอกไม้ที่ยืนหยัดเพื่อความรักและความหลงใหล อีกทั้งยังเป็นตัวแทนของรักครั้งใหม่', 'price' => 220, 'image' => '/images/4.webp'],
        ['id' => 5, 'name' => 'Daisy', 'description' => 'เดซี่ ดอกไม้ขนาดเล็กที่น่าทนุถนอมนี้ มีความหมายสื่อถึงความไร้เดียงสา และความซื่อสัตย์ต่อความรัก เป็นรักที่บริสุทธิ์ เหมาะมากที่จะนำไปมอบให้กับคนรักในโอกาสดีๆ', 'price' => 100, 'image' => '/images/05.jpg'],
        ['id' => 6, 'name' => 'For get me not', 'description' => 'ฟอร์เก็ทมีน็อท แค่ชื่อของดอกไม้ก็สื่อความหมายดีๆว่า “อย่าลืมฉัน” เหมาะกับไปมอบให้กับคนรัก เพื่อบอกเป็นนัยว่าอย่าลืมความทรงจำดีๆที่เรามีร่วมกัน ในขณะเดียวกันก็สามารถมอบดอกไม้นี้ให้กับคนที่อยู่ห่างไกล เพื่อแทนความหมายว่าเราจะไม่ลืมกันได้อีกด้วย', 'price' => 160, 'image' => '/images/06.jpg'],
        ['id' => 7, 'name' => 'Camellia', 'description' => 'คามิเลีย เป็นสัญลักษณ์แห่งความสง่างามและเย้ายวนของหญิงสาว ในด้านความรู้สึก ดอกคามิเลียมีความหมายว่าความปรารถนา ความละเอียดอ่อน และความซื่อสัตย์ ', 'price' => 120, 'image' => '/images/07.jpeg'],
        ['id' => 8, 'name' => 'Sun flower', 'description' => 'ทานตะวัน มีความหมายแบบฝรั่งว่า “The Sun Always Blooms” ความมั่นคง ภักดี ความร่าเริงสดใส และเต็มไปด้วยความมีชีวิตชีวา แต่สื่อแทนใจ บอกความรู้สึกแบบภาษาดอกไม้มีความหมายที่น่ารักมากว่า 
            “รักของฉันมั่นคงและภักดีต่อเธอเสมอ ดุจดั่งทานตะวันที่ไม่เคยหันมองผู้ใดนอกจากดวงอาทิตย์ เหมือนดั่งความรักของฉันผู้มอบดอกทานตะวันนี้แด่เธอผู้เป็นที่รัก” ความหมายลึกซึ้งและอบอุ่นมาก', 'price' => 220, 'image' => '/images/08.jpg'],
        ['id' => 9, 'name' => 'Caspia', 'description' => 'แคสเปีย เป็นดอกไม้เล็กๆ เมื่อนำมาจัดช่อให้อยู่รวมกันเยอะๆ ยิ่งทำให้ดอกแคสเปียดูสวยงาม อ่อนหวาน ถึงแม้จะแห้งไปแล้ว ดอกไม้ชนิดนี้ก็ยังคงสวยงามอยู่ ความหมายของดอกนี้คือ ความรักที่มั่นคงไม่เปลี่ยนแปลง
             และให้คนๆนั้นเป็นความทรงจำที่ไม่มีวันลืมเลือน', 'price' => 350, 'image' => '/images/09.webp'],
        ['id' => 10, 'name' => 'Rose', 'description' => 'กุหลาบ เป็นสัญลักษณ์ของความรัก ความสวยงาม ความโรแมนติก ด้วยความที่ดอกกุหลาบมีหลายสี และแต่ละสีก็มีความหมายแตกต่างกันไป ผู้คนจึงนิยมนำดอกกุหลาบไปมอบให้กับคนรักเพื่อสื่อความในใจ', 'price' => 220, 'image' => '/images/10.jpeg'],
        ['id' => 11, 'name' => 'Caspia', 'description' => 'แคสเปีย เป็นดอกไม้เล็กๆ เมื่อนำมาจัดช่อให้อยู่รวมกันเยอะๆ ยิ่งทำให้ดอกแคสเปียดูสวยงาม อ่อนหวาน เป็นความทรงจำที่ไม่มีวันลืมเลือน', 'price' => 350, 'image' => '/images/11.jpg'],
        ['id' => 12, 'name' => 'Rose', 'description' => 'กุหลาบ เป็นสัญลักษณ์ของความรัก ความสวยงาม ความโรแมนติก  ผู้คนจึงนิยมนำดอกกุหลาบไปมอบให้กับคนรักเพื่อสื่อความในใจ', 'price' => 220, 'image' => '/images/12.jpg'],
        
    ];
    // จำเป็นต้องใส้ก่อนมะงั้นแดงจ้าาาาาาาาาาาาาาาาาาาา
    public function index()
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);  //use Inertia\Inertia; จำเป็น
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = collect($this->products)->firstWhere('id', $id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        return Inertia::render('Products/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
