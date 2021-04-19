package com.example.khoa_luan_tot_nghiep.View.NhaSi

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageView
import com.bumptech.glide.Glide
import com.bumptech.glide.request.RequestOptions
import com.example.khoa_luan_tot_nghiep.R
import kotlinx.android.synthetic.main.activity_detail__nha_si.*

class Detail_NhaSi : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detail__nha_si)
        val avata : ImageView = findViewById(R.id.avata_nhasi_detail)
        val i = intent
        Glide.with(this)
                .load(i.getStringExtra("hinhanh")).placeholder(R.drawable.ic_load_avata_24).
                error(R.drawable.ic_load_avata_24).apply(RequestOptions.circleCropTransform()).override(170,170).into(avata)
        ten_nhasi_detail.text = i.getStringExtra("ten")
        so_dien_thoai_nha_si_detail.text = i.getStringExtra("sdt")
        gioi_tinh_nha_si_detail.text = i.getStringExtra("gioitinh")
        gioi_thieu_nha_si_detail.text = i.getStringExtra("gioithieu")
        trinh_do_hoc_van_nha_si_detail.text = i.getStringExtra("trinhdo")
        lich_lam_viec_nha_si_detail.text = i.getStringExtra("lich")

    }
}