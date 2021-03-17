package com.example.dangkykham

import android.os.AsyncTask
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.dangkykham.Adapter.VandeAdapter
import com.example.dangkykham.entity.Vande
import kotlinx.android.synthetic.main.activity_main.*
import org.json.JSONArray
import org.json.JSONObject
import java.io.BufferedReader
import java.io.InputStreamReader
import java.net.HttpURLConnection
import java.net.URL

class MainActivity : AppCompatActivity() {
    val vandes = ArrayList<Vande>()
    lateinit var adapter : VandeAdapter

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        val i = intent
        val URL: String? =     i.getStringExtra("nhucau")
        var URL_GET : String = "http://192.168.1.81:80/Do_An/API/api_nhucau.php?key_word="
        URL_GET = URL_GET.plus(URL)
        clearListVideo()
        Getdata().execute(URL_GET)
        initAdapter()
        initRecyclerView()
//

    }
    private fun makeCurrentFragment(fragment: Fragment)=
            supportFragmentManager.beginTransaction().apply {
                replace(R.id.fl_ok,fragment)
                commit()
            }
    private fun initRecyclerView() {
        rvAmUser.layoutManager = LinearLayoutManager(this)
        rvAmUser.setHasFixedSize(true)
        rvAmUser.adapter = adapter
    }

    private fun initAdapter() {
        adapter = VandeAdapter(vandes)
    }
    fun clearListVideo(){
        vandes.clear()
    }

    inner class Getdata : AsyncTask<String, Void, String>() {

        override fun doInBackground(vararg p0: String?): String {
            return getContentURL(p0[0])
        }

        override fun onPostExecute(result: String?) {
            super.onPostExecute(result)
//            var idd: String=""
//            var namee: String = ""
//            var url_s: String = ""
            var tenvd : String? =""
            var motavd :String?= ""
            var anh: String? = ""
            var jsonArray: JSONArray = JSONArray(result)
            for (vd in 0..jsonArray.length() - 1) {
                var objectVD: JSONObject = jsonArray.getJSONObject(vd)
//                idd= objectVD.getString("ID")
//                namee = objectVD.getString("song")
//                url_s = objectVD.getString("songkey")
                val id_vd : String = objectVD.getString("id_vande")
                tenvd = objectVD.getString("tenvande")
                motavd = objectVD.getString("mota")
                anh = objectVD.getString("ing")

                vandes.add(Vande(id_vd,tenvd,anh,motavd))
                //listview.Name.text = name
                //mangbaihat.add(id+"\n"+name+"")
            }
            adapter.notifyDataSetChanged()
        }
    }
    private fun getContentURL(url: String?) : String{
        var content: StringBuilder = StringBuilder();
        val url: URL = URL(url)
        val urlConnection: HttpURLConnection = url.openConnection() as HttpURLConnection
        val inputStreamReader = InputStreamReader(urlConnection.inputStream)
        val bufferedReader: BufferedReader = BufferedReader(inputStreamReader)

        var line: String = ""
        try {
            do {
                line = bufferedReader.readLine()
                if(line != null){
                    content.append(line)
                }
            }while (line != null)
            bufferedReader.close()
        }catch (e: Exception){
            Log.d("Loi la:", e.toString())
        }
        return content.toString()
    }
}