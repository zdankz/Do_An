package com.example.khoa_luan_tot_nghiep.Network

import android.annotation.TargetApi
import android.content.BroadcastReceiver
import android.content.Context
import android.content.Intent
import android.content.IntentFilter
import android.net.*
import android.os.Build
import androidx.lifecycle.LiveData

class NetwordConnection(private  val context : Context) : LiveData<Boolean>() {
    private var connectivitymanager : ConnectivityManager

    = context.getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager
    private  lateinit var networkCallback : ConnectivityManager.NetworkCallback

    override fun onActive() {
        super.onActive()
        updateConnection()
        when {
            Build.VERSION.SDK_INT >= Build.VERSION_CODES.N -> {
                connectivitymanager.registerDefaultNetworkCallback(connectivityManagerCallback())
            }
            Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP ->{
                lolipopnewworkRequest()
            }
            else -> {
                context.registerReceiver(
                        networkRecieve,
                        IntentFilter(ConnectivityManager.CONNECTIVITY_ACTION)
                )
            }

        }

    }

    override fun onInactive() {
        super.onInactive()
        if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP){
        connectivitymanager.unregisterNetworkCallback(connectivityManagerCallback())
        }else {
            context.unregisterReceiver(networkRecieve)
        }
    }
    
    @TargetApi(Build.VERSION_CODES.LOLLIPOP)

    private fun lolipopnewworkRequest(){
        var requestBuilder = NetworkRequest.Builder()
                .addTransportType(NetworkCapabilities.TRANSPORT_CELLULAR)
                .addTransportType(NetworkCapabilities.TRANSPORT_WIFI)
                .addTransportType(NetworkCapabilities.TRANSPORT_ETHERNET)
        connectivitymanager.registerNetworkCallback(
                requestBuilder.build(),
                connectivityManagerCallback()
        )
    }

    private  fun connectivityManagerCallback() : ConnectivityManager.NetworkCallback{
        if(Build.VERSION.SDK_INT >=  Build.VERSION_CODES.LOLLIPOP){
            networkCallback = object : ConnectivityManager.NetworkCallback() {
                override fun onLost(network: Network) {
                    super.onLost(network)
                    postValue(false)
                }

                override fun onAvailable(network: Network) {
                    super.onAvailable(network)
                    postValue(true)
                }
            }
            return  networkCallback
        }else{
            throw IllegalAccessError("E")
        }
    }
    private val networkRecieve = object  : BroadcastReceiver(){
        override fun onReceive(context: Context?, intent: Intent?) {
//            TODO("Not yet implemented")
            updateConnection()
        }
    }

    private fun updateConnection(){
        val activeNetwork : NetworkInfo? = connectivitymanager.activeNetworkInfo
        postValue(activeNetwork?.isConnected == true)

    }
}