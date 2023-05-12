import time
import csv
import datetime
from w1thermsensor import W1ThermSensor

def read_temperature(sensor):
    temperature = sensor.get_temperature()
    return round(temperature, 2)

def write_to_csv(filename, timestamp, temperature):
    with open(filename, 'a', newline='') as csvfile:
        writer = csv.writer(csvfile)
        writer.writerow([timestamp, temperature])

def main():
    sensor = W1ThermSensor()

    filename = 'temperature.csv'

    while True:
        timestamp = datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        temperature = read_temperature(sensor)
        write_to_csv(filename, timestamp, temperature)
        print(f'Temperature: {temperature}°C ({timestamp})')
        # Du kannst hier eine Pause einfügen, um die Abtastrate einzustellen
        time.sleep(2)

if __name__ == '__main__':
    main()
