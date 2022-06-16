<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        // Insert for categories table
        DB::table('categories')->insert([
            [
                'name' => 'Kiếm hiệp'
            ],
            [
                'name' => 'Lịch sử'
            ],
            [
                'name' => 'Tiên hiệp'
            ],
            [
                'name' => 'Huyền huyễn'
            ],
            [
                'name' => 'Quân sự'
            ]
        ]);

        //Insert users table 
        DB::table('users')->insert([
            [
                'name' => 'Người dùng',
                'email' => 'user@mail.com',
                'password' => '12345'
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => '12345'
            ]
        ]);

        //Insert for creations table
        DB::table('creations')->insert([
            [
                'image' => 'taotac.jpg',
                'name' => 'Tào tặc',
                'author' => 'Canh Tân',
                'source' => 'truyenfull.vn',
                'status' => 1,
                'description' => 'Trong Luận ngữ, Khổng Tử có nói: "nhân chi sinh dã trực, võng chi sinh dã, hạnh nhi miễn" (Lẽ sống là phải ngay thẳng, chẳng ngay thẳng mà sống thì ấy là nhờ may mắn tránh khỏi tai họa mà thôi).
                    Nhân vật chính Tào Bằng trong truyện là một cảnh sát, sau khi phá án được vinh danh anh hùng, không ngờ kẻ phản bội trong vụ án đó lại chính là bạn thân mình, rồi bị bắn chết. Hắn trọng sinh vào nhà họ Tào thời Tam Quốc. Thử hỏi, như Khổng Tử nói thì có nên tiếp tục sống làm kẻ chính trực như kiếp trước rồi bị phản bội bởi kẻ thân, hay được trọng sinh vào thời loạn lạc là một may mắn cần phải biết nắm giữ?
                    Giữa thời tam quốc với bao anh hùng hào kiệt, nhân sĩ mưu cao, tác giả khắc họa nhân vật Tào Bằng chỉ là một kẻ tầm thường: văn không đặc biệt mà võ cũng không xuất chúng. Hắn không phải là một kẻ dũng mãnh vô địch vì đã có Lữ Bố, Triệu Vân, ai có thể hơn ; hắn không phải là một kẻ thông minh xuất chúng mưu lược tài giỏi vì đã có Khổng Minh, Bàng Thống, ai có thể bằng ; cũng không phải kẻ tham vọng lập bá nghiệp vì đã có Lưu Bị, Tào Tháo. Hắn chỉ có một điểm hơn bất kỳ ai thời ấy, một kẻ biết trước tất cả. Chính nhờ cái hơn người đó mà hắn đã từng bước đưa bản thân mình ngoi lên vị trí cao trong thời đại loạn lạc đó.'
            ],
            [
                'image' => 'quyenthan.jpg',
                'name' => 'Quyền thần',
                'author' => 'Sa Mạc',
                'source' => 'truyenfull.vn',
                'status' => 1,
                'description' => ' Hắn làm cho tên tuổi một gia tộc trở thành chiêu bài của một quốc gia. Bước qua giới hạn thời gian và không gian, vứt bỏ sự trói buộc thân phận, dẫn dắt một gia tộc đã từng một thời huy hoàng tiến lên thời kỳ đỉnh phong, có lí tưởng thực hiện mọi chuyện. Chỉ cần trợn mắt nhướng mày, dựa vào ba ngón tay vàng náo động bốn quốc gia, làm Cửu đại thế gia lục đục với nhau và hơn mười danh tướng cùng nhau tranh đoạt thiên hạ, mưu lược bày ra đủ để khẳng định địa vị...'
            ],
            [
                'image' => 'thandaodanton.jpg',
                'name' => 'Thần đạo đan tôn',
                'author' => 'Cô Đơn Địa Phi',
                'source' => 'Phong Nguyệt Lâu',
                'status' => 0,
                'description' => 'Lăng Hàn - Một Đan Đế đại danh đỉnh định mang trong thân mình tuyệt thế công pháp vì truy cầu bước cuối, xé bỏ tấm màn thành thần nhưng thất bại đã phải bỏ mình. Thế nhưng ông trời dường như không muốn tuyệt dường người, Lăng Hàn đã được trọng sinh vào một thiếu niên cùng tên và điều may mắn nhất là "Bất Diệt Thiên Kinh" ấn ký vẫn còn nằm nguyên trong tâm thức hắn.
                        Từ nay về sau sóng gió cuộn trào nổi lên, Đan Đế ngày xưa bây giờ phải cùng tranh phong với vô số thiên tài trẻ tuổi, lại bắt đầu một truyền thuyết mới như để chứng minh với trời đất: Ta, là người mạnh nhất!
                        Phân chia cảnh giới: Luyện Thể, Tụ Nguyên, Dũng Tuyền, Linh Hải, Thần Thai, Sinh Hoa, Linh Anh, Hóa Thần cùng Thiên Nhân Cảnh.....
                        Mỗi cảnh giới chia làm chín tầng: tầng một đến ba là tiền kỳ, tầng bốn đến sáu gọi là trung kỳ và tầng bảy đến chín gọi là hậu kỳ và đỉnh'
            ],
            [
                'image' => 'dai-thoi-dai-1958.jpg',
                'name' => 'Đại thời đại 1958',
                'author' => 'Thanh Sơn Thiết Sam',
                'source' => 'tangthuvien',
                'status' => 0,
                'description' => 'Liên Xô là một biểu tượng, là một cuộc thí nghiệm xã hội khổng lồ. Liên Xô không hoàn hảo nhưng nó là cuộc hành trình tìm kiếm tương lai hoàn mỹ cho toàn thể loài người. Liên Xô đã thất bại, đã tan rã nhưng nếu Liên Xô là một sai lầm thì tại sao lại có nhiều người đau đớn và nuối tiếc nó đến thế?
                Câu chuyện về quá trình ngăn chặn sự sụp đổ của Liên Xô, đánh bại nước Mỹ của thanh niên xuyên việt không có trí tuệ tuyệt đỉnh, không có hệ thống, cũng chẳng có bá khí quang hoàn. Lịch sử có thể được thay đổi nhưng đó là kết tinh của 10 năm, 20 năm, 30 năm cố gắng không ngừng nghỉ....
                "Một số công nhân phương tây cho rằng cuộc sống của họ cũng không tệ, đó không phải là vì nhà tư bản lương tâm bộc phát! Đó đơn giản chỉ là vì Liên Xô vẫn còn đang tồn tại thôi" Yuri Yefimovich Serov'
            ],
            [
                'image' => 'dao-si-kinh-ky.jpg',
                'name' => 'đạo sĩ kinh kỳ',
                'author' => 'Trần Huữ Khương',
                'source' => 'wattpad.com',
                'status' => 1,
                'description' => 'Ngày nay mọi người sống trong cuộc sống hiện đại mà liệu có còn tồn tại những loại bùa chú, ma thuật nữa hay không? Ngoài ra còn có ma quỷ tồn tại trên đời này không? Liệu có những đạo sĩ trừ ma diệt quỷ?
                Mọi chuyện bắt đầu từ cái chết của một  người bạn mà một cậu học trò bình thường nghiện truyện ma bỗng chốc trở thành đạo sĩ tập sự. Từ đó, Lâm lại phát hiện ra nhiều điều kì lạ về chính bản thân mình.
                Liệu rằng cuộc sống của Lâm có bị đảo lộn?'
            ]
        ]);
    }
}
