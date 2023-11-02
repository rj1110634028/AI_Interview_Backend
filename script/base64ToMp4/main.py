import base64
import sys

if __name__ == "__main__":
    
# 从Base64字符串加载文件内容
    f=open(sys.argv[1],"r")
    base64_data=f.read()
    f.close()
    binary_data = base64.b64decode(base64_data)

    # 将二进制数据写入MP4文件
    with open(sys.argv[2], "wb") as mp4_file:
        mp4_file.write(binary_data)
    print("MP4文件已保存为 "+sys.argv[2])