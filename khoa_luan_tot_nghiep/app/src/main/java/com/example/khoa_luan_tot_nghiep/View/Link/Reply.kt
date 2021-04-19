package com.example.khoa_luan_tot_nghiep.View.Link

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_reply.*

class Reply : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_reply)
        val i = intent
        val id = i.getStringExtra("id")
        val ch = i.getStringExtra("ch")
        cauhoi.text = i.getStringExtra("ch")
        if(id.equals("1")){

            reply.text = "Hầu hết mọi người đều sợ nha sĩ vì phòng khám răng thường gắn liền với đau đớn. Nếu bạn rơi vào trường hợp này thì hãy bình tĩnh vì đó là điều hết sức bình thường và có thể khắc phục được.\n" +
                    "\n" +
                    "Điều quan trọng nhất để giảm bớt gánh nặng khi đi nha sĩ là bạn phải đi khám ngay khi vấn đề xuất hiện! Nếu bạn bị đau răng nhưng đợi đến khi cơn đau đã trầm trọng và kéo dài thì quá trình gây tê khi chữa răng sẽ trở nên khó khăn. Việc trì hoãn này khiến bạn phải chịu đau hơn nhiều lần so với khi đi khám ngay lập tức."

        }
        if(id.equals("2")){
            reply.text = "Đầu tiên, vi khuẩn trong mảng bám hoặc axit trong đồ ăn làm tăng độ axit trong miệng. Môi trường axit này góp phần làm mòn và gây tổn thương cấu trúc men răng. Dần dần, một khoang sâu răng sẽ được hình thành trong men răng rồi ăn vào sâu hơn.\n" +
                    "\n" +
                    "Những cơn sâu răng rất khó chịu và đau nên bạn hãy phòng ngừa trước khi sâu răng hình thành. Bạn có thể ngừa sâu răng bằng một số cách:\n" +
                    "\n" +
                    "– Thường xuyên kiểm tra men răng và đi khám ngay khi có dấu hiệu sâu răng.\n" +
                    "\n" +
                    "– Không để răng ở trong một môi trường có tính axit trong một thời gian dài. Để tránh tăng độ axit trong miệng, bạn hãy súc miệng bằng nước súc miệng sau khi ăn kẹo hoặc uống nước ngọt. Nếu không có sẵn nước súc miệng, bạn hãy uống một ít nước.\n" +
                    "\n" +
                    "– Không uống nước ngọt, nước trái cây hoặc các đồ uống tương tự trước khi đi ngủ hoặc sau khi bạn đánh răng. Miệng không tiết nước bọt vào bạn đêm nên các loại đồ uống trên sẽ bắt đầu bào mòn men răng khi bạn ngủ. Bạn chỉ nên uống nước lọc thôi nhé."

        }
        if(id.equals("3")){
            reply.text = "Nếu bạn không có bất kỳ vấn đề răng miệng nào như răng nhạy cảm, chảy máu nướu răng… thì bạn có thể sử dụng bất kỳ kem đánh răng nào. Ngược lại, nếu bạn có bất kì vần đề răng miệng nào thì hãy hỏi ý kiến bác sĩ về cách chọn kem đánh răng.\n" +
                    "\n" +
                    "Hơn nữa, bạn cũng nên chú ý đến nồng độ fluor trong nguồn cung cấp nước khu vực của bạn. Nếu lượng fluor trong nguồn nước của ab5n thấp hơn chỉ số tối ưu là 0,7-1,2 mg/l, bạn nên sử dụng kem đánh răng có fluor. Đây là chất giúp bạn chống sâu răng rất hiệu quả đấy."
        }
        if(id.equals("4")){
            reply.text = "Các vết nứt là những rãnh tự nhiên trên bề mặt nhai của răng hàm. Đây là nơi thức ăn dễ bị mắc kẹt và tạo điều kiện thuận lợi cho việc sinh sản của các vi khuẩn gây bệnh. Vậy nên khu vực này thường là nơi hình thành sâu răng nhiều nhất.\n" +
                    "\n" +
                    "Để ngăn ngừa sự phát triển sâu răng trong khu vực này, bạn có thể tham khảo cách trám răng. Quy trình này bao gồm làm sạch rồi trám vết nứt lại bằng một chất đặc biệt. Sau khi trám, lượng vi khuẩn ở những vết nứt sẽ giảm thiểu.\n" +
                    "\n" +
                    "Việc trám răng có thể thực hiện ở mọi lứa tuổi và cũng rất nhanh chóng. Bạn hãy thảo luận với bác sĩ nếu thấy mình cần trám răng nhé."
        }
        if(id.equals("5")){
            reply.text = "Veneer có thể bị vỡ nếu bị áp lực quá mạnh nên những ai bị bệnh nghiến răng không nên lắp Veneer. Ngoài ra, bạn cũng không nên lắp veneer nếu đang thiếu một chiếc răng hàm. Lý do là vì khi bạn thiếu răng, lực nhai tác động lên những răng còn lại là rất lớn và có thể làm bể miếng Veneer.\n" +
                    "\n" +
                    "Bạn hãy khôi phục số lượng răng và chức năng nhai của các răng trước khi gắn Veneer."
        }
        if(id.equals("6")){
            reply.text = "Nếu một chiếc răng của bạn đã bị nhổ bỏ, bạn không nên trì hoãn việc lắp răng giả dù chi phí lắp răng có mắc hay chiếc răng bị nhổ ở vị trí khuất không ai thấy.\n" +
                    "\n" +
                    "Khi một chiếc răng bị nhổ, những chiếc răng kế bên sẽ di chuyển sang chỗ răng trống và lấp mất chỗ để cấy răng giả. Hơn nữa, việc răng di chuyển như vậy sẽ làm ảnh hưởng tới hình dạng hàm và từ đó làm thay đổi luôn khuôn mặt của bạn."
        }
        if(id.equals("7")){
            reply.text = "Độ mài mòn trong kem đánh răng (Relative Dentin Abrasivity_RDA) thay đổi từ 0 đến 220. Những kem đánh răng có độ RDA cao trên 70 có thể bào mòn răng khá nhiều nên bạn không nên dùng mỗi ngày. Tuy nhiên, nếu răng bạn không nhạy cảm và bạn lại thường xuyên uống trà hay cà phê, bạn có sử dụng kem đánh răng có độ RDA cao thường xuyên hơn.\n" +
                    "\n" +
                    "Đối với răng nhạy cảm, bạn nên chọn một loại kem đánh răng có RDA thấp nhất (khoảng 20-40). Ngoài ra, trước khi quyết định sử dụng những loại kem đánh răng làm trắng, bạn hãy tham khảo ý kiến nha sĩ trước."
        }
        if(id.equals("8")){
            reply.text = "Để làm sạch răng tốt hơn, bạn hãy kiểm tra răng 6 tháng một lần kết hợp với vệ sinh răng miệng. Ngay cả khi bạn đã chải răng đúng cách thì vẫn có những nơi khuất trong miệng khó làm sạch. Nha sĩ sẽ tiếp cận để làm sạch những vùng này và xử lý các dấu hiệu sâu răng ngay ở giai đoạn đầu."
        }
        if(id.equals("9")){
            reply.text = "TRA LOI CAU HOI so 9"
        }
        if(id.equals("10")){
            reply.text = "TRA LOI CAU HOI so 10"
        }
        if(id.equals("11")){
            reply.text = "TRA LOI CAU HOI so 11"
        }
        if(id.equals("12")){
            reply.text = "TRA LOI CAU HOI so 12"
        }
        Back_reply.setOnClickListener {
            val i = Intent(this, List_Question::class.java)
            startActivity(i)
            finish()
        }


    }
}