if [ $1 ]
then
        export ratio=$(echo "0.65*$1" | bc -l)
else
	export ratio=0.65
fi

python main.py -m screen:onesv,scale=$ratio
