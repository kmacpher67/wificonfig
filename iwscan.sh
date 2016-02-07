#!/bin/bash 
function iwScan() {
   # disable globbing to avoid surprises
   set -o noglob
   # make temporary variables local to our function
   local AP S
   # read stdin of the function into AP variable
   while read -r AP; do
     ## print lines only containing needed fields
     [[ "${AP//'ESSID: '*}" == '' ]] && printf '%b' "${AP/'ESSID: '}\n"
     [[ "${AP//'Encryption: '*}" == '' ]] && ( S=( ${AP/'Encryption: '} ); printf '%b' "${S[0]},";)
   done
   set +o noglob
}

iwScan <<< "$(iwlist wlan0 scan)"

