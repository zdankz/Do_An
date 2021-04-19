package com.example.khoa_luan_tot_nghiep.View.VanDe

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageView
import com.bumptech.glide.Glide
import com.bumptech.glide.request.RequestOptions
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_detail__van_de__nha_si.*

class Detail_VanDe_NhaSi : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail__van_de__nha_si)
        val i = intent
        val avata : ImageView = findViewById(R.id.avata_vande_nhasi_detail)
        Glide.with(this)
            .load(i.getStringExtra("hinhanh")).placeholder(R.drawable.ic_load_avata_24).
            error(R.drawable.ic_load_avata_24).apply(RequestOptions.circleCropTransform()).override(100,100).into(avata)
        ten_vande_nhasi_detail.text = i.getStringExtra("ten")
        lich_lam_viec_vande_nha_si_detail.text = i.getStringExtra("lich")
        gioi_thieu_vande_nha_si_detail.text = i.getStringExtra("gioithieu")
        trinh_do_hoc_van_vande_nha_si_detail.text = i.getStringExtra("trinhdo")
        gioi_tinh_vande_nha_si_detail.text = i.getStringExtra("gioitinh")
        val id_nd = i.getStringExtra("idns")
    }
}